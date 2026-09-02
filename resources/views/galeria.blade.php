@extends('app')

@section('title', 'Galeria de filmes')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Galeria de filmes</h1>
        @auth
            <a class="btn btn-primary" href="{{ route('filmes.create') }}">Cadastrar filme</a>
        @endauth
    </div>

    <form class="row g-3 mb-4" method="GET" action="{{ route('galeria') }}">
        <div class="col-md-5">
            <label class="form-label" for="categoria_id">Categoria</label>
            <select class="form-select" id="categoria_id" name="categoria_id">
                <option value="">Todas</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @selected(request('categoria_id') == $categoria->id)>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label" for="ano">Ano</label>
            <select class="form-select" id="ano" name="ano">
                <option value="">Todos</option>
                @foreach ($anos as $ano)
                    <option value="{{ $ano }}" @selected(request('ano') == $ano)>{{ $ano }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 d-flex align-items-end gap-2">
            <button class="btn btn-primary w-100" type="submit">Filtrar</button>
            <a class="btn btn-outline-secondary" href="{{ route('galeria') }}">Limpar</a>
        </div>
    </form>

    <div class="row g-4">
        @forelse ($filmes as $filme)
            <div class="col-sm-6 col-lg-3">
                <a class="card h-100 text-decoration-none text-dark" href="{{ route('filmes.show', $filme) }}">
                    <img class="card-img-top object-fit-cover" src="{{ asset('storage/' . $filme->capa) }}" alt="Capa do filme {{ $filme->nome }}" style="height: 320px;">
                    <div class="card-body">
                        <h2 class="h5 card-title">{{ $filme->nome }}</h2>
                        <p class="card-text mb-1">{{ $filme->ano }}</p>
                        <span class="badge text-bg-secondary">{{ $filme->categoria->nome }}</span>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">Nenhum filme encontrado.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $filmes->links() }}
    </div>
@endsection
