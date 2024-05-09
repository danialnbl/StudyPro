<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platinum extends Model
{
    use HasFactory;

    protected $table ='platinum';
    protected $fillable = [
        'P_IC',
        'P_Name',
        'P_Gender',
        'P_Religion',
        'P_Race',
        'P_Citizenship',
        'P_Address',
        'P_City',
        'P_State',
        'P_Country',
        'P_Zip',
        'P_PhoneNumber',
        'P_Email',
        'P_Facebook',
        'P_TshirtSize',
        'P_DateApply',
        'P_Program',
        'P_Batch',
        'P_Status',
        'P_Title',
        'PE_Id',
        'PR_Id'
    ];
}
