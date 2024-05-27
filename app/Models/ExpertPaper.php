<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertPaper extends Model
{
    use HasFactory;

    protected $fillable = [
        'EP_Paper',
        'EP_Year',
        'E_ID',
        'ER_ID',
    ];

    public $timestamps = false;
    protected $table = 'ExpertPapers';
    protected $primaryKey = 'EP_ID';
}
