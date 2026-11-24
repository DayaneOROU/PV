<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PvOcrMatricule extends Model
{
    protected $table = 'pv_ocr_matricules';
    
    protected $fillable = ['pv_ocr_id', 'matricule', 'page', 'confiance', 'valide'];

    public function pvOcr()
    {
        return $this->belongsTo(PvOcr::class);
    }
}