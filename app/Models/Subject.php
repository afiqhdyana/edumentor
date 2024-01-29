<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable = ['id','name']; // If you have any other fillable fields

    public function students()
{
    return $this->belongsToMany(Student::class, 'subject_student', 'subject_id', 'matricNo')->withPivot('status');
}
}
