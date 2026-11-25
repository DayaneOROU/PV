<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnneeAcademique extends Model
{
   
// On autorise l'enregistrement de tous ces champs
protected $table = 'annees_academiques';
protected $fillable = ['libelle'];


    public function pvs()
    {
        return $this->hasMany(Pv::class);
    }
}