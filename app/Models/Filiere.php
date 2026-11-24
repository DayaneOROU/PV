<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = ['departement_id', 'code', 'nom'];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function pvs()
    {
        return $this->hasMany(Pv::class);
    }
}