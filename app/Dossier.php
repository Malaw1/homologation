<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $fillable = [
        'moduleNumber',
        'fileName',
        'user_id',
        'demande_id',
    ];
}
