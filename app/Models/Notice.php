<?php

// app/Models/Notice.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Notice.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = ['supervisor_id', 'recipient_id', 'matricNo', 'student_name', 'complaint'];


    public function getComplaintAttribute()
    {
        return $this->attributes['complaint'];
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'matricNo');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}



