<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendances extends Model
{
    public function student()
    {
        return $this->belongsTo(students::class, 'Student_id', 'id');
    }
    
    use HasFactory;
    public function batch()
    {
        return $this->belongsTo(batch::class);
    }
}
