@extends('app')

@section('title', 'Categorias')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Categorias</h1>
        <a class="btn btn-primary" href="{{ route('categorias.create') }}">Nova categoria</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive ">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Filmes</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nome }}</td>
                        <td>{{ $categoria->filmes_count }}</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('categorias.edit', $categoria) }}">Editar</a>
                            <form class="d-inline" method="POST" action="{{ route('categorias.destroy', $categoria) }}" onsubmit="return confirm('Excluir esta categoria?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-muted" colspan="3">Nenhuma categoria cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $categorias->links() }}
@endsection
