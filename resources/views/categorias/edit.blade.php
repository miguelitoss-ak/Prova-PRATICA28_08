@extends('app')

@section('title', 'Editar categoria')

@section('content')
    <h1 class="h3 mb-4">Editar categoria</h1>

    <form method="POST" action="{{ route('categorias.update', $categoria) }}">
        @method('PUT')
        @include('categorias._form')
    </form>
@endsection
