@extends('app')

@section('title', 'Editar filme')

@section('content')
    <h1 class="h3 mb-4">Editar filme</h1>

    <form method="POST" action="{{ route('filmes.update', $filme) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('filmes._form')
    </form>
@endsection
