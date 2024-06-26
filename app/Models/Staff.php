<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'S_IC';
    protected $table = 'Staff';
    protected $fillable =[
        'S_IC',
        'S_Name',
        'S_Email',
        'S_PhoneNumber',
        'S_StaffID'
    ];

    protected function casts(): array
    {
        return [
            'S_IC' => 'string',
        ];
    }
}
