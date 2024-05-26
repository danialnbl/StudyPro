<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable =[
        'PI_File',
        'PI_FilePath',
        'PI_Type',
        'M_IC',
        'P_IC',
        'S_IC',
        'E_IC',
    ];

    public $timestamps = false;
    protected $table = 'pictures';
    protected $primaryKey = 'PI_ID';
}
