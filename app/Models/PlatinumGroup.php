<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatinumGroup extends Model
{
    use HasFactory;

    protected $table = 'platinumgroup';
    protected $primaryKey = 'PG_ID';

    protected $fillable = [
        'PG_ID',
        'S_IC',
        'M_IC',
    ];

}
