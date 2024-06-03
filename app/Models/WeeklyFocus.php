<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyFocus extends Model
{
    use HasFactory;

    protected $primaryKey = 'DT_DraftNumber';

    protected $fillable = [
        'DT_DraftNumber',
        'DT_Title',
        'DT_StartDate',
        'DT_EndDate',
        'DT_PagesNumber',
        'DT_draftFile',
        'DT_DDC',
    ];

    protected $table = 'DraftThesis';

    public $timestamps = false; // If you don't have created_at and updated_at columns
}
