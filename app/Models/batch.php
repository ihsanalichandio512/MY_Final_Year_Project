<?php

namespace App\Models;

use App\Models\students;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class batch extends Model
{
    // protected $table = 'batch';
    protected $primaryKey = 'Batch_id';

    use HasFactory;
    public $timestamps = false;

    public function students()
    {
        return $this->hasMany(students::class);
    }
}
