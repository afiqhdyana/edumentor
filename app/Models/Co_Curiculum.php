<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Co_Curiculum extends Model
{
    use HasFactory;
    protected $table='co_curiculums';
    protected $fillable=['id','matricNo', 'code', 'description'];
}
