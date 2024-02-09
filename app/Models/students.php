<?php

namespace App\Models;

use App\Models\batch;
use App\Models\semester;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class students extends Model
{
    use HasFactory;

    protected $primaryKey = 'Student_id';
    public function semesters() {
        return $this->hasMany(semester::class);
    }

    public function batches() {
        return $this->hasMany(batch::class);
    }
}
