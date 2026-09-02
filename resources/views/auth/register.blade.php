@extends('app')

@section('title', 'Cadastro')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h1 class="h3 mb-4">Cadastro</h1>

            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="name">Nome</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">E-mail</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Senha</label>
                    <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" required>
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">Confirmar senha</label>
                    <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" required>
                </div>

                <button class="btn btn-primary" type="submit">Cadastrar</button>
                <a class="btn btn-outline-secondary" href="{{ route('login') }}">Ja tenho conta</a>
            </form>
        </div>
    </div>
@endsection
