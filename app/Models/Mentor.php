<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable =[
        'M_IC',
        'M_Name',
        'M_Email',
        'M_PhoneNumber',
        'M_MentorID'
    ];
}
