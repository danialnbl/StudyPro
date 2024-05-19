<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatinumEducation extends Model
{
    use HasFactory;
    
    protected $table = 'PlatinumEducation';
    public $timestamps = false;
    protected $fillable = [
        'PE_EduInstitute',
        'PE_Sponsorship',
        'PE_ProgramFee',
        'PE_EduLevel',
        'PE_Occupation'
    ];

    // Define the inverse relationship with Platinum
    public function platinum()
    {
        return $this->hasOne(Platinum::class, 'PE_Id');
    }
}
