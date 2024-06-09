<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platinum extends Model //implements MustVerifyEmail
{
    // Define the relationship with PlatinumEducation
    public function education()
    {
        return $this->belongsTo(PlatinumEducation::class, 'PE_Id');
    }

    // Define the relationship with PlatinumReferral
    public function referral()
    {
        return $this->belongsTo(PlatinumReferral::class, 'PR_Id');
    }

    //Define the relationship with Publication
    public function publication()
    {
        return $this->belongsTo(PublicationData::class, 'PD_ID');
    }

    use HasFactory;
    protected $primaryKey = 'P_IC';
    protected $table = 'Platinum';
    public $timestamps = false;
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
        'P_Title'
    ];

    protected function casts(): array
    {
        return [
            'P_IC' => 'string',
        ];
    }
}


