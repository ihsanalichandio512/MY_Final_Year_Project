<?php

namespace App\Models;

use App\Models\batch;
use App\Models\semester;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class students extends Model
{

    use HasFactory;

    protected $fillable = [
        'Name',
        'Batch_id',
        'Degree_id',
        'Semester_id',
        'Gender',
        'Date_of_Birth',
        'Contact_No',
        'Cnic',
        'Address',
        'Picture',
    ];

    public function degree()
    {
        return $this->belongsTo(degrees::class);
    }

    public function attendanceRecords()
    {
        return $this->hasMany(attendances::class);
    }
    public $timestamps = false;
   
}
