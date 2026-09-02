@extends('app')

@section('title', 'Cadastrar filme')

@section('content')
    <h1 class="h3 mb-4">Cadastrar filme</h1>

    <form method="POST" action="{{ route('filmes.store') }}" enctype="multipart/form-data">
        @include('filmes._form')
    </form>
@endsection
