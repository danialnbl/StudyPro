<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyFocus extends Model
{
    use HasFactory;

    protected $table = 'WeeklyFocus';
    protected $primaryKey = 'wf_id';

    protected $fillable = [
        'WF_FocusBlock', //ejas sini
        'WF_AdminInfo',
        'WF_FocusInfo',
        'WF_SocialInfo',
        'WF_RecoveryInfo',
        //'WF_Feedback',
        'WF_Date',
    ];

    public $timestamps = false; // If you don't have created_at and updated_at columns

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'M_IC', 'M_IC'); 
    }

    public function platinum()
    {
        return $this->belongsTo(Platinum::class, 'P_IC', 'P_IC'); 
    }

    public function getInputinfoAttribute()
    {
        switch ($this->WF_Block) {
            case 'admin':
                return $this->WF_AdminInfo;
            case 'focus':
                return $this->WF_FocusInfo;
            case 'recovery':
                return $this->WF_RecoveryInfo;
            case 'social':
                return $this->WF_SocialInfo;
            default:
                return null;
        }
    }
}
