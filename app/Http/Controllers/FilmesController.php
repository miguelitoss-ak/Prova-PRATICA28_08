<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class FilmesController extends Controller
{
    public function index(Request $request)
    {
        $query = Filme::with(['categoria', 'user'])->latest();

        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->input('categoria_id'));
        }

        if ($request->filled('ano')) {
            $query->where('ano', $request->input('ano'));
        }

        $filmes = $query->paginate(12)->withQueryString();
        $categorias = Categoria::orderBy('nome')->get();
        $anos = Filme::select('ano')->distinct()->orderByDesc('ano')->pluck('ano');

        return view('galeria', compact('filmes', 'categorias', 'anos'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('filmes.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $dados = $this->validateFilme($request);
        $dados['capa'] = $request->file('capa')->store('capas', 'public');
        $dados['user_id'] = Auth::id();

        Filme::create($dados);

        return redirect()->route('admin.filmes.index')->with('success', 'Filme adicionado com sucesso!');
    }

    public function show(Filme $filme)
    {
        $filme->load(['categoria', 'user']);

        return view('filmes.show', compact('filme'));
    }

    public function edit(Filme $filme)
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('filmes.edit', compact('filme', 'categorias'));
    }

    public function update(Request $request, Filme $filme)
    {
        $dados = $this->validateFilme($request, false);

        if ($request->hasFile('capa')) {
            Storage::disk('public')->delete($filme->capa);
            $dados['capa'] = $request->file('capa')->store('capas', 'public');
        }

        $filme->update($dados);

        return redirect()->route('admin.filmes.index')->with('success', 'Filme atualizado com sucesso!');
    }

    public function destroy(Filme $filme)
    {
        Storage::disk('public')->delete($filme->capa);
        $filme->delete();

        return redirect()->route('admin.filmes.index')->with('success', 'Filme excluido com sucesso!');
    }

    public function adminIndex()
    {
        $filmes = Filme::with(['categoria', 'user'])->latest()->paginate(10);

        return view('filmes.index', compact('filmes'));
    }

    private function validateFilme(Request $request, bool $capaObrigatoria = true): array
    {
        return $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'ano' => ['required', 'integer', 'min:1888', 'max:' . now()->year],
            'sinopse' => ['required', 'string', 'max:5000'],
            'capa' => [$capaObrigatoria ? 'required' : 'nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'link' => ['nullable', 'url', 'max:255'],
            'categoria_id' => ['required', Rule::exists('categorias', 'id')],
        ]);
    }
}
