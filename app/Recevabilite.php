<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recevabilite extends Model
{
    protected $fillable = [
        'user_id', 'demande_id', 'deadline', 'commentaire'
    ];
}
