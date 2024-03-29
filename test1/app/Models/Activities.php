<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    protected $table='activity';
    protected $fillable=['id','matricNo', 'program', 'place', 'place', 'achievement', 'category', '	level', 'merit'];
}
