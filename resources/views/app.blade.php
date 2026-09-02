<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MigFlix')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="m-0 p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('galeria') }}">
                <img src="{{ asset('storage/capas/migflix.png') }}" alt="MigFlix" style="height: 40px;">
            </a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('galeria') }}">Galeria</a>
                @auth
                    <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="nav-link btn btn-link" type="submit">Sair</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                    <a class="nav-link" href="{{ route('register') }}">Cadastro</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container py-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
