<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

class Anuncio extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'imagem',
        'user_id',
        'contato_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    /* public function scopeActive(Builder $query): void
    {
        $query->whereHas('user.plano', fn(Builder $planQuery) => $planQuery->where('conf_pagamento', true));

    } */
}
