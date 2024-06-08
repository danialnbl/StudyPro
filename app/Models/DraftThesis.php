<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftThesis extends Model
{
    use HasFactory;

    protected $table = 'draftthesis';
    protected $primaryKey = 'DT_ID';

    protected $fillable = [
        'DT_ID',
        'DT_Title',
        'DT_DraftNumber',
        'DT_StartDate',
        'DT_EndDate',
        'DT_PagesNumber',
        'DT_Feedback',
        'DT_TotalPages',
        'DT_PrepDays',
        'DT_DDC',
        'P_IC',
        'M_IC',
    ];

    public $timestamps = false; // If you don't have created_at and updated_at columns

        // Define the relationships
        public function mentor()
        {
            return $this->belongsTo(Mentor::class, 'M_IC', 'M_IC'); 
        }
    
        public function platinum()
        {
            return $this->belongsTo(Platinum::class, 'P_IC', 'P_IC'); 
        }
}
