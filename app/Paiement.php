<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'name_on_card',
        'card_number',
        'expiration',
        'cvv',
        'user_id',
        'demande_id'
    ];
}
