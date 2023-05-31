<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CEP extends Model
{
    use HasFactory;

    public function endereco(): BelongsToMany
    {
        return $this->belongsToMany(Endereco::class);
    }
}
