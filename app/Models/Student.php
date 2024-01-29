<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'matricNo';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['matricNo', 'studName', 'semester', 'CGPA', 'phoneNumber', 'muet'];
    protected $casts = [
        'CGPA' => 'float',
        'muet' => 'float',
    ];

    public function results()
    {
        return $this->hasMany(Results::class, 'matricNo', 'matricNo');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function subjects()
{
    return $this->belongsToMany(Subject::class, 'subject_student', 'matricNo', 'subject_id')->withPivot('status');
}

public function personalAdvisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id'); // Correct column name
    }

}
