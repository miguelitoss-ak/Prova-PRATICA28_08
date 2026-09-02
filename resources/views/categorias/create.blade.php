@extends('app')

@section('title', 'Nova categoria')

@section('content')
    <h1 class="h3 mb-4">Nova categoria</h1>

    <form method="POST" action="{{ route('categorias.store') }}">
        @include('categorias._form')
    </form>
@endsection
