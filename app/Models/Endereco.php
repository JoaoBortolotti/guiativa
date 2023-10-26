<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'endereco',
        'bairro',
        'complemento',
        'numero',
        'user_id',
    ];

    protected function enderecoMaps() : Attribute
    {
        return Attribute::make(
            get: fn()=> $this->endereco.','.$this->numero.','.$this->cep->cidade
        );
    }

    protected function cep(): HasOne
    {
        return $this->hasOne(CEP::class);
    }

    protected function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
