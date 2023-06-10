<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'ddd',
        'telefone',
        'celular',
        'user_id',
    ];

    protected function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
