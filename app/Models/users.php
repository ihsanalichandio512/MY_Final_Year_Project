<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class users extends Model
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;
    public $timestamps = false;


    public function roles()
    {
        return $this->belongsToMany(roles::class);
    }

    public function hasRole($role)
    {
        return $this->roles()->where('Title', $role)->exists();
    }
}

