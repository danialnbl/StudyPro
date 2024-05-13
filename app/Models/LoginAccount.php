<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginAccount extends Model
{
    use HasFactory;

    protected $primaryKey = 'LA_ID'; // Assuming LA_ID is the primary key

    // Define the fillable attributes
    protected $fillable = [
        'LA_Username',
        'LA_Password',
        'M_IC',
        'S_IC',
        'P_IC',
    ];

    // Define the relationships
    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'M_IC', 'M_IC'); 
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'S_IC', 'S_IC'); 
    }

    public function platinum()
    {
        return $this->belongsTo(Platinum::class, 'P_IC', 'P_IC'); 
    }
}


