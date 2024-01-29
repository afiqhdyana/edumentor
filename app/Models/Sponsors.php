<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsors extends Model
{
    use HasFactory;
    protected $table='sponsor';
    protected $fillable=['id','matricNo','sponsor_id', 'dateOffer', 'dateTerminate', 'status'];
}
