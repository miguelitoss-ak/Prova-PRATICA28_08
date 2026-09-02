<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::withCount('filmes')->orderBy('nome')->paginate(10);

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        Categoria::create($this->validateCategoria($request));

        return redirect()->route('categorias.index')->with('success', 'Categoria cadastrada com sucesso!');
    }

    public function show(Categoria $categoria)
    {
        return redirect()->route('categorias.edit', $categoria);
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($this->validateCategoria($request, $categoria));

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Categoria $categoria)
    {
        if ($categoria->filmes()->exists()) {
            return back()->withErrors('Nao e possivel excluir uma categoria com filmes cadastrados.');
        }

        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria excluida com sucesso!');
    }

    private function validateCategoria(Request $request, ?Categoria $categoria = null): array
    {
        return $request->validate([
            'nome' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categorias', 'nome')->ignore($categoria),
            ],
        ]);
    }
}
