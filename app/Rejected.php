<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rejected extends Model
{
    protected $fillable = [
        'user_id',
        'demande_id'
    ];


}
