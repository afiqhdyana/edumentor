<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $table = 'result';

    public function resultDetails()
    {
        return $this->hasMany(Result_Detail::class, 'matricNo', 'matricNo')->where('semester', $this->semester);
    }
}
