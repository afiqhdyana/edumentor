<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification_Detail extends Model
{
    use HasFactory;
    protected $table='qualifications_details';
    protected $fillable=['id', 'qualification_desc', 'subject', 'result', 'point'];
}
