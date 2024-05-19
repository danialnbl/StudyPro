<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatinumReferral extends Model
{
    use HasFactory;
    
    protected $table = 'PlatinumReferral';
    public $timestamps = false;
    protected $fillable = [
        'PR_Name',
        'PR_Batch'
    ];

    // Define the inverse relationship with Platinum
    public function platinum()
    {
        return $this->hasOne(Platinum::class, 'PR_Id');
    }
}

