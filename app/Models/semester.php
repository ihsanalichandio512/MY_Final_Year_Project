<?php

namespace App\Models;

use App\Models\students;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class semester extends Model
{

    public function degree()
    {
        return $this->belongsTo(degrees::class, 'Degree_id', 'id');
    }
    use HasFactory;
    protected $table = 'semester';
    protected $primaryKey = 'Semester_id';
    public $timestamps = false;
    public function student() {
        return $this->belongsTo(students::class);
    }

}
