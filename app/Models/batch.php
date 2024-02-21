<?php

namespace App\Models;

use App\Models\students;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class batch extends Model
{
    public function students()
    {
        return $this->hasMany(students::class);
    }

    public function attendances()
    {
        return $this->hasMany(attendances::class);
    }

    public function degrees()
    {
        return $this->hasMany(degrees::class, 'Batch_id', 'id');
    }
    // protected $table = 'batch';
    protected $primaryKey = 'Batch_id';

    use HasFactory;
    public $timestamps = false;

}
