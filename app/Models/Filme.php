<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Filme extends Model
{
    use HasFactory;

    protected $table = 'filmes';

    protected $fillable = [
        'nome',
        'ano',
        'sinopse',
        'capa',
        'link',
        'user_id',
        'categoria_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
