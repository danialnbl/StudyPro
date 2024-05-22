<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertResearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'E_ID',
        'ER_Title',
    ];

    public $timestamps = false;
    protected $table = 'ExpertResearch';
}
