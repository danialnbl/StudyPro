<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftThesis extends Model
{
    use HasFactory;

    protected $fillable = [
        'DT_ID',
        'DT_Title',
        'DT_DraftNumber',
        'DT_StartDate',
        'DT_EndDate',
        'DT_PagesNumber',
        'DT_Feedback',
        'DT_DDC',
    ];

    protected $table = 'DraftThesis';

    public $timestamps = false; // If you don't have created_at and updated_at columns
}
