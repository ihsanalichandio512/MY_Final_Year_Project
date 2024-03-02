<?php

namespace App\Models;

use App\Models\students;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class semester extends Model
{

    use HasFactory;

    protected $fillable = [
        'Title',
    ];

    // Uncomment and modify this relationship if you use a student_semester link table
    public function students()
    {
        return $this->belongsToMany(students::class);
    }

    public function attendanceRecords()
    {
        return $this->hasMany(attendances::class);
    }

    public function batch()
    {
        return $this->belongsTo(batch::class); // Define the relationship
    }

}
