<?php

require __DIR__.'/vendor/autoload.php';

use thiagoalessio\TesseractOCR\TesseractOCR;

// 1. On définit le chemin absolu (sans utiliser storage_path)
$pdfPath = 'C:\Cour L3\FRAMEWORK  LARAVEL\PV\storage\app\public\pvs\20261124210712_p0uhd8QRFU.pdf';
$imagePath = 'C:\Cour L3\FRAMEWORK  LARAVEL\PV\page_test.jpg';

try {
    echo "1. Verification du fichier...\n";
    if (!file_exists($pdfPath)) {
        throw new \Exception("Fichier introuvable : " . $pdfPath);
    }

    echo "2. Conversion avec Ghostscript...\n";
    
    // On utilise des guillemets simples pour la commande Windows
    // et on échappe correctement les chemins
    $cmd = 'gswin64c -sDEVICE=jpeg -dFirstPage=1 -dLastPage=1 -r300 -o "' . $imagePath . '" "' . $pdfPath . '" 2>&1';
    
    exec($cmd, $output, $returnVar);

    if ($returnVar !== 0 || !file_exists($imagePath)) {
        echo "Sortie de Ghostscript : \n";
        print_r($output);
        throw new \Exception("Ghostscript a échoué (code " . $returnVar . ").");
    }

    echo "Image générée avec succès !\n\n";

    echo "3. Lancement de l'OCR...\n";
    $resultat = (new TesseractOCR($imagePath))
        ->lang('fra')
        ->run();

    echo "--- TEXTE DÉTECTÉ (début) ---\n";
    echo substr($resultat, 0, 500) . "...\n"; 
    echo "-----------------------------\n";

} catch (\Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}

// Nettoyage
if (file_exists($imagePath)) {
    unlink($imagePath);
}