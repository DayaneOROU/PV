<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'departement_id',
        'filiere_id',
        'actif',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'actif' => 'boolean',
        ];
    }

    // --- RELATIONS ---
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function pvsUploades()
    {
        return $this->hasMany(Pv::class, 'uploaded_by');
    }
}