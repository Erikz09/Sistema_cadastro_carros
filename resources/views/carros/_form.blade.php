@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <strong>Corrija os erros abaixo:</strong>
        <ul class="mb-0 mt-1">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label text-secondary small">Marca *</label>
        <input type="text" name="marca"
            class="form-control bg-dark border-secondary text-white @error('marca') is-invalid @enderror"
            value="{{ old('marca', $carro->marca ?? '') }}"
            placeholder="Ex: Toyota">
        @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label text-secondary small">Modelo *</label>
        <input type="text" name="modelo"
            class="form-control bg-dark border-secondary text-white @error('modelo') is-invalid @enderror"
            value="{{ old('modelo', $carro->modelo ?? '') }}"
            placeholder="Ex: Corolla">
        @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label class="form-label text-secondary small">Ano *</label>
        <input type="number" name="ano"
            class="form-control bg-dark border-secondary text-white @error('ano') is-invalid @enderror"
            value="{{ old('ano', $carro->ano ?? '') }}"
            placeholder="Ex: 2023">
        @error('ano') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label class="form-label text-secondary small">Cor *</label>
        <input type="text" name="cor"
            class="form-control bg-dark border-secondary text-white @error('cor') is-invalid @enderror"
            value="{{ old('cor', $carro->cor ?? '') }}"
            placeholder="Ex: Prata">
        @error('cor') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label class="form-label text-secondary small">Preço (R$) *</label>
        <input type="number" step="0.01" name="preco"
            class="form-control bg-dark border-secondary text-white @error('preco') is-invalid @enderror"
            value="{{ old('preco', $carro->preco ?? '') }}"
            placeholder="Ex: 85000.00">
        @error('preco') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label class="form-label text-secondary small">Placa *</label>
        <input type="text" name="placa" maxlength="7"
            class="form-control bg-dark border-secondary text-white @error('placa') is-invalid @enderror"
            value="{{ old('placa', $carro->placa ?? '') }}"
            placeholder="Ex: ABC1D23">
        @error('placa') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

        <div class="col-md-6">
            <label class="form-label text-secondary small">Foto do Carro</label>
            <input type="file" name="foto" accept="image/*"
                class="form-control bg-dark border-secondary text-white @error('foto') is-invalid @enderror">
            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror

            @if(!empty($carro->foto))
                <div class="mt-2 d-flex align-items-center gap-3">
                    {{-- Removido o asset('storage/') para usar o caminho tratado pelo Accessor --}}
                    <img src="{{ $carro->foto }}"
                        width="80" class="rounded border border-secondary"
                        style="height: 55px; object-fit: cover;">
                    <small class="text-secondary">Foto atual — envie uma nova para substituir</small>
                </div>
            @endif
        </div>
    </div>
</div>