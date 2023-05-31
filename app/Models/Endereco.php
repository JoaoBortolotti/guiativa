<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Endereco extends Model
{
    use HasFactory;

    protected function cep(): HasOne
    {
        return $this->hasOne(CEP::class);
    }

    protected function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
