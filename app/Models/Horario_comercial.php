<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Horario_comercial extends Model
{
    use HasFactory;

    protected $fillable = [
        'dom',
        'seg',
        'ter',
        'qua',
        'qui',
        'sex',
        'sab',
        'user_id',
    ];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
