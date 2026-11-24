<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PvOcr extends Model
{
    protected $table = 'pv_ocr'; // On précise le nom car Laravel chercherait "pv_ocrs"
    
    protected $fillable = ['pv_id', 'statut', 'texte_brut', 'traite_le'];

    public function pv()
    {
        return $this->belongsTo(Pv::class);
    }

    public function matricules()
    {
        return $this->hasMany(PvOcrMatricule::class);
    }
}