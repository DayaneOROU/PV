<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pv extends Model
{   
    use SoftDeletes;
    
    protected $fillable = [
        'reference',
        'filiere_id',
        'niveau_id',
        'semestre_id',
        'annee_academique_id',
        'uploaded_by',
        'type_pv',
        'session',
        'statut',
        'date_deliberation',
        'groupe',
        'fichier_path',
    ];

    // --- RELATIONS ---
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class);
    }

    public function anneeAcademique()
    {
        return $this->belongsTo(AnneeAcademique::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function ocr()
    {
        return $this->hasOne(PvOcr::class);
    }

    public function journalAcces()
    {
        return $this->hasMany(JournalAcces::class);
    }
}