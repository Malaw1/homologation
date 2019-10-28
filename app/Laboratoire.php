<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratoire extends Model
{
    protected $fillable = [
        'name', 'adresse', 'pays', 'region', 'telephone', 'email', 'zip', 'user_id'
    ];
}
