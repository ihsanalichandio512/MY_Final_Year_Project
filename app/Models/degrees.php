<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class degrees extends Model
{
    public function batch()
    {
        return $this->belongsTo(batch::class, 'Batch_id', 'id');
    }

    public function semesters()
    {
        return $this->hasMany(semester::class, 'Degree_id', 'id');
    }

    protected $table = 'degrees';
    protected $primaryKey = 'Degree_id';
    use HasFactory;
    public $timestamps = false;

}
