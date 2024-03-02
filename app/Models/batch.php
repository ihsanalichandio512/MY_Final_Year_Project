<?php

namespace App\Models;

use App\Models\students;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'Title',
        'Degree_id', // Foreign key to degrees table
    ];

    public function degree()
    {
        return $this->belongsTo(degrees::class);
    }

    // Uncomment and modify this relationship if you use a student_batch link table
    public function students()
    {
        return $this->belongsToMany(students::class);
    }
    public function semesters()
    {
        return $this->hasMany(semester::class); // Define the relationship
    }
    public $timestamps = false;

}
