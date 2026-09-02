@csrf

<div class="mb-3">
    <label class="form-label" for="nome">Nome</label>
    <input class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $categoria->nome ?? '') }}" required>
    @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button class="btn btn-primary" type="submit">Salvar</button>
<a class="btn btn-outline-secondary" href="{{ route('categorias.index') }}">Cancelar</a>
