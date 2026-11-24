<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnneeAcademique extends Model
{
    protected $fillable = ['libelle'];

    public function pvs()
    {
        return $this->hasMany(Pv::class);
    }
}