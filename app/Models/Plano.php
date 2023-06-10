<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plano extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'conf_pagamento',
        'user_id',
    ];

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
