<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    use HasFactory;
    protected $table='relatives';
    protected $fillable=['id','matricNo','name', 'relation', 'address', 'telNum'];
    
}
