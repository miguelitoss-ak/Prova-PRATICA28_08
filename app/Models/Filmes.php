<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filmes extends Model
{
    protected $fillable = ['nome', 'ano', 'sinopse', 'capa', 'link', 'user_id', 'categoria_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}

class Categoria extends Model
{
    protected $fillable = ['nome'];

    public function filmes()
    {
        return $this->hasMany(Filmes::class);
    }
}