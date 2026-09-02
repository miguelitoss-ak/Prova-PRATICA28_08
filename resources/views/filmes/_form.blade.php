@csrf

<div class="mb-3">
    <label class="form-label" for="nome">Nome</label>
    <input class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $filme->nome ?? '') }}" required>
    @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label" for="ano">Ano</label>
        <input class="form-control @error('ano') is-invalid @enderror" id="ano" name="ano" type="number" min="1888" max="{{ now()->year }}" value="{{ old('ano', $filme->ano ?? '') }}" required>
        @error('ano') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-8 mb-3">
        <label class="form-label" for="categoria_id">Categoria</label>
        <select class="form-select @error('categoria_id') is-invalid @enderror" id="categoria_id" name="categoria_id" required>
            <option value="">Selecione</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" @selected(old('categoria_id', $filme->categoria_id ?? '') == $categoria->id)>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
        @error('categoria_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label" for="sinopse">Sinopse</label>
    <textarea class="form-control @error('sinopse') is-invalid @enderror" id="sinopse" name="sinopse" rows="5" required>{{ old('sinopse', $filme->sinopse ?? '') }}</textarea>
    @error('sinopse') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="link">Trailer no YouTube</label>
    <input class="form-control @error('link') is-invalid @enderror" id="link" name="link" type="url" value="{{ old('link', $filme->link ?? '') }}" placeholder="https://www.youtube.com/watch?v=...">
    @error('link') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="capa">Imagem da capa</label>
    <input class="form-control @error('capa') is-invalid @enderror" id="capa" name="capa" type="file" accept="image/jpeg,image/png,image/webp" {{ isset($filme) ? '' : 'required' }}>
    @error('capa') <div class="invalid-feedback">{{ $message }}</div> @enderror
    @isset($filme)
        <div class="form-text">Envie uma nova imagem apenas se quiser trocar a capa atual.</div>
    @endisset
</div>

<button class="btn btn-primary" type="submit">Salvar</button>
<a class="btn btn-outline-secondary" href="{{ route('admin.filmes.index') }}">Cancelar</a>
