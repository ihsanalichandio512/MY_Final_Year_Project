<?php

namespace App\Models;

use App\Models\students;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class semester extends Model
{
    use HasFactory;
    protected $table = 'semester';
    protected $primaryKey = 'Semester_id';
    public $timestamps = false;
    public function student() {
        return $this->belongsTo(students::class);
    }

}
