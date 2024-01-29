<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Detail extends Model
{
    use HasFactory;
    protected $table='students_details';
    protected $fillable=['id','matricNo', 'course', 'program', 'faculty'];

}
