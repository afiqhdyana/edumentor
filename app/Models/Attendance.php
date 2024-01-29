<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['subject_id','matricNo', 'attendance_date', 'status']; // Add other fillable fields

    // Define the structure of the attendance table

    // Relationship with Student model
    public function student()
    {
        return $this->belongsTo(Student::class, 'matricNo', 'matricNo');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}

