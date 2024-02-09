<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class degrees extends Model
{

    protected $table = 'degrees';
    protected $primaryKey = 'Degree_id';
    use HasFactory;
    public $timestamps = false;

}
