@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Marca *</label>
            <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror"
                value="{{ old('marca', $carro->marca ?? '') }}">
            @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Modelo *</label>
            <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror"
                value="{{ old('modelo', $carro->modelo ?? '') }}">
            @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Ano *</label>
            <input type="number" name="ano" class="form-control @error('ano') is-invalid @enderror"
                value="{{ old('ano', $carro->ano ?? '') }}">
            @error('ano') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Cor *</label>
            <input type="text" name="cor" class="form-control @error('cor') is-invalid @enderror"
                value="{{ old('cor', $carro->cor ?? '') }}">
            @error('cor') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Preço (R$) *</label>
            <input type="number" step="0.01" name="preco" class="form-control @error('preco') is-invalid @enderror"
                value="{{ old('preco', $carro->preco ?? '') }}">
            @error('preco') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Placa *</label>
            <input type="text" name="placa" maxlength="7" class="form-control @error('placa') is-invalid @enderror"
                value="{{ old('placa', $carro->placa ?? '') }}">
            @error('placa') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Foto do Carro</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
            @if(!empty($carro->foto))
                <div class="mt-2">
                    <small>Foto atual:</small><br>
                    <img src="{{ asset('storage/' . $carro->foto) }}" width="120" class="rounded mt-1">
                </div>
            @endif
        </div>
    </div>
</div>