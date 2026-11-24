<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $fillable = ['numero'];

    public function pvs()
    {
        return $this->hasMany(Pv::class);
    }
}