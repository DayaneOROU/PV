<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $fillable = ['code', 'ordre'];

    public function pvs()
    {
        return $this->hasMany(Pv::class);
    }
}