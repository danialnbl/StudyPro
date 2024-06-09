<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'M_IC';
    protected $table = 'Mentor';
    protected $fillable =[
        'M_IC',
        'M_Name',
        'M_Email',
        'M_PhoneNumber',
        'M_MentorID'
    ];
    protected function casts(): array
    {
        return [
            'M_IC' => 'string',
        ];
    }
}
