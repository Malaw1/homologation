<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    protected $fillable = [
        'nature',
        'validite',
        'nom_autorite',
        'nom_responsable',
        'pays',
        'adresse',
        'contact',
        'mise_a_jour',
        'demande_id'
    ];
}
