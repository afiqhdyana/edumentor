<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;
    protected $table='financials';
    protected $fillable=['id','matricNo', 'bank_name', 'bank_acc'];
}
