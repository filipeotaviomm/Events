<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    //na tabela "events" o campo "items" foi colocado como json, então tem que fazer isso
    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];

    //tem que ter isso para poder atualizar, o campo que eu colocar dentro do array ele não poderá ser atualizado
    protected $guarded = [];

    //relacionamento com user
    public function user()
    {
        return $this->BelongsTo('App\Models\User');
    }
}
