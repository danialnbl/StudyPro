<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationData extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'PublicationData';
    protected $primaryKey = 'PD_ID';
}
