<?php

namespace App\Jobs;

use App\Models\Pv;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ProcessOcrJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $pv;

    public function __construct(Pv $pv)
    {
        $this->pv = $pv;
    }

    public function handle(): void
    {
        $ocr = $this->pv->ocr()->updateOrCreate(
            ['pv_id' => $this->pv->id],
            ['statut' => 'en_cours', 'traite_le' => now()]
        );

        try {
            $pdfPath = str_replace('\\', '/', Storage::disk('public')->path($this->pv->fichier_path));
            
            // 1. On définit un préfixe pour les images (ex: temp_3_page_)
            $imagePrefix = str_replace('\\', '/', storage_path('app/public/temp_' . $this->pv->id . '_page_'));

            // 2. Ghostscript : On retire -dLastPage=1 pour qu'il génère TOUTES les pages
            // Le %d sera remplacé par le numéro de page (1, 2, 3...)
            $ghostscriptPath = '"C:\Program Files\gs\gs10.08.0\bin\gswin64c.exe"';
            $cmd = $ghostscriptPath . ' -dNOSAFER -sDEVICE=png16m -r600 -o "' . $imagePrefix . '%d.png" "' . $pdfPath . '" 2>&1';
            
            exec($cmd, $output, $returnVar);

            if ($returnVar !== 0) {
                throw new \Exception("Ghostscript a échoué.");
            }

            // 3. On récupère toutes les images générées
            $images = glob($imagePrefix . '*.png');
            $texteBrutTotal = "";
            $tousLesMatricules = [];

            // 4. On boucle sur chaque page
            foreach ($images as $index => $imagePath) {
                $numeroPage = $index + 1;
                
                // OCR sur la page
                $textePage = (new TesseractOCR($imagePath))
                    ->lang('fra')
                    ->config('tessedit_char_whitelist', '0123456789 ')
                    ->run();

                $texteBrutTotal .= "\n--- Page " . $numeroPage . " ---\n" . $textePage;

                // Extraction des matricules pour cette page
                if (preg_match_all('/(\d[\d\s]{4,10}\d)/', $textePage, $matches)) {
                    foreach ($matches[0] as $match) {
                        $matriculeClean = str_replace([' ', "\xC2\xA0"], '', $match);
                        if (strlen($matriculeClean) >= 6 && strlen($matriculeClean) <= 10) {
                            // On stocke le matricule avec le numéro de page
                            $tousLesMatricules[$matriculeClean] = $numeroPage; 
                        }
                    }
                }

                // On supprime l'image de la page pour ne pas surcharger le disque
                unlink($imagePath);
            }

            // 5. Sauvegarde du texte brut global
            $ocr->update([
                'texte_brut' => $texteBrutTotal,
                'statut' => 'termine'
            ]);

            // 6. Enregistrement des matricules uniques
            foreach ($tousLesMatricules as $matricule => $page) {
                $ocr->matricules()->create([
                    'matricule' => $matricule,
                    'page' => $page,
                    'valide' => false
                ]);
            }

        } catch (\Exception $e) {
            $ocr->update(['statut' => 'echoue']);
            Log::error('Erreur OCR PV ' . $this->pv->id . ' : ' . $e->getMessage());
        }
    }
}