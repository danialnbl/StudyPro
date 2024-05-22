<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = [
        'E_Name',
        'E_University',
        'E_Email',
        'E_PhoneNumber',
        'P_IC',
    ];

    public $timestamps = false;
    protected $table = 'Experts';
}
