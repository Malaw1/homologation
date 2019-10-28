<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'nom_medicament',
        'forme_pharmaceutique',
        'demande_id',
        'forme_pharmaceutique',
        'email',
        'presentation',
        'phone',
        'classe_therapeutique',
        'pght',
        'manufacturer',
        'indication',
        'adresse',
        'excipient'
    ];
}
