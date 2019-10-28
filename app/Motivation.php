<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivation extends Model
{
    protected $fillable = [
        'motivation', 'demande_id', 'user_id'
    ];
}
