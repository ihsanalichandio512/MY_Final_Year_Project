<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendances extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'degree_id',
        'batch_id',
        'semeste_id',
        'dateTime',
        'attendence', // Present or Absent
    ];

    public function student()
    {
        return $this->belongsTo(students::class);
    }

    public function degree()
    {
        return $this->belongsTo(degrees::class);
    }

    public function batch()
    {
        return $this->belongsTo(batch::class);
    }

    public function semester()
    {
        return $this->belongsTo(semester::class);
    }
   
}
