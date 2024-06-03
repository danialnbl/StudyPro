<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftThesis extends Model
{
    use HasFactory;

    protected $fillable = [
        //'WF_FocusBlock', //ejas sini
        'WF_AdminInfo',
        'WF_FocusInfo',
        'WF_SocialInfo',
        'WF_RecoverInfo',
        //'WF_Feedback',
        'WF_Date',
    ];

    protected $table = 'WeeklyFocus';

    public $timestamps = false; // If you don't have created_at and updated_at columns
}
