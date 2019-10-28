<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = ['label', 'date_debut', 'date_fin', 'user_id'];

}
