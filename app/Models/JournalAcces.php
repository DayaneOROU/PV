<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JournalAcces extends Model
{
    protected $table = 'journal_acces';
    
    protected $fillable = ['user_id', 'pv_id', 'action', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pv()
    {
        return $this->belongsTo(Pv::class);
    }
}