<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    //na tabela "events" o campo "items" foi colocado como json, então tem que fazer isso
    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];
}
