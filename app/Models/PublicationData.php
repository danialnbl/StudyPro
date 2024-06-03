<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationData extends Model
{
    use HasFactory;

    protected $fillable = [
        'PD_Title',
        'PD_University',
        'PD_Type',
        'PD_Author',
        'PD_FileName',
        'PD_FilePath',
        'PD_Date',
    ];

    public $timestamps = false;
    protected $table = 'PublicationData';
    protected $primaryKey = 'PD_ID';
}
