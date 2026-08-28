<?php

namespace App\Http\Controllers;

use App\Models\Filmes;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FilmesController extends Controller
{
    public function index(Request $request)
    {
        $query = Filmes::with('categoria');

        if($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->input('categoria_id'));
        }

        if($request->filled('ano')){
            $query->where('ano', $request->ano);
        }

        $filmes = $query->get();
        $categorias = Categoria::all();

        return view('galeria', compact('filmes', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'ano' => 'required|integer',
            'sinopse' => 'required|string',
            'capa' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categoria_id' => 'required',
        ]);

        $caminhoCapa = $request->file('capa')->store('capas', 'public');

        Filme::create([
            'nome' => $request->nome,
            'ano' => $request->ano,
            'sinopse' => $request->sinopse,
            'capa' => $caminhoCapa,
            'link' => $request->link,
            'categoria_id' => $request->categoria_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('filmes.index')->with('success', 'Filme adicionado com sucesso!');

    }
}
