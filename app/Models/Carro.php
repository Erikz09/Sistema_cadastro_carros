<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
        'marca', 'modelo', 'ano', 'cor', 'preco', 'placa', 'foto', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}