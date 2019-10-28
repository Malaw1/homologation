<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Echantillon extends Model
{
    protected $fillable = [
        'nombre',
        'date_peremption',
        'numero_lot',
        'numero_certificat',
        'demande_id',
    ];
}
