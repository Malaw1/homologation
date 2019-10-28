<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = [
        'type', 'status', 'user_id', 'approuved_by', 'rejected_by', 'labo', 'produit', 'code', 'dci'
    ];
}
