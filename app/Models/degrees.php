<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class degrees extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'Title',
    ];

    public function students()
    {
        return $this->hasMany(students::class);
    }
    public $timestamps = false;

}
