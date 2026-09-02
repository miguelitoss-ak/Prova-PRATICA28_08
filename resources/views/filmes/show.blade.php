@extends('app')

@section('title', $filme->nome)

@section('content')
    <div class="row g-4">
        <div class="col-md-4">
            <img class="img-fluid rounded" src="{{ asset('storage/' . $filme->capa) }}" alt="Capa do filme {{ $filme->nome }}">
        </div>

        <div class="col-md-8">
            <h1 class="h2">{{ $filme->nome }}</h1>
            <p class="text-muted">{{ $filme->ano }} | {{ $filme->categoria->nome }}</p>
            <p>{{ $filme->sinopse }}</p>

            @if ($filme->link)
                <a class="btn btn-danger" href="{{ $filme->link }}" target="_blank" rel="noopener noreferrer">Assistir trailer</a>
            @endif

            <a class="btn btn-outline-secondary" href="{{ route('galeria') }}">Voltar</a>
        </div>
    </div>
@endsection
