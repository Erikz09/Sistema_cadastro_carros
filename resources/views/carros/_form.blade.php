@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show elevation-1" role="alert">
        <h5><i class="icon fas fa-ban"></i> Atenção! Verifique os erros abaixo:</h5>
        <ul class="mb-0 pl-3">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="row">
    {{-- Marca --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fas fa-industry mr-1 text-muted"></i> Marca <span class="text-danger">*</span></label>
            <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror"
                value="{{ old('marca', $carro->marca ?? '') }}" placeholder="Ex: Mercedes-Benz">
            @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Modelo --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fas fa-car-side mr-1 text-muted"></i> Modelo <span class="text-danger">*</span></label>
            <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror"
                value="{{ old('modelo', $carro->modelo ?? '') }}" placeholder="Ex: AMG GT">
            @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Ano --}}
    <div class="col-md-3">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fas fa-calendar-alt mr-1 text-muted"></i> Ano <span class="text-danger">*</span></label>
            <input type="number" name="ano" class="form-control @error('ano') is-invalid @enderror"
                value="{{ old('ano', $carro->ano ?? '') }}" placeholder="Ex: 2020">
            @error('ano') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Cor --}}
    <div class="col-md-3">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fas fa-palette mr-1 text-muted"></i> Cor <span class="text-danger">*</span></label>
            <input type="text" name="cor" class="form-control @error('cor') is-invalid @enderror"
                value="{{ old('cor', $carro->cor ?? '') }}" placeholder="Ex: Cinza Prata">
            @error('cor') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Preço --}}
    <div class="col-md-3">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fas fa-dollar-sign mr-1 text-muted"></i> Preço (R$) <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="preco" class="form-control @error('preco') is-invalid @enderror"
                value="{{ old('preco', $carro->preco ?? '') }}" placeholder="0,00">
            @error('preco') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Placa --}}
    <div class="col-md-3">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fas fa-id-card mr-1 text-muted"></i> Placa <span class="text-danger">*</span></label>
            <input type="text" name="placa" maxlength="7" class="form-control text-uppercase @error('placa') is-invalid @enderror"
                value="{{ old('placa', $carro->placa ?? '') }}" placeholder="Ex: ABC1D23" style="letter-spacing: 1px;">
            @error('placa') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Foto do Carro --}}
    <div class="col-md-12">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fas fa-camera mr-1 text-muted"></i> Foto do Carro</label>
            <div class="custom-file">
                <input type="file" name="foto" class="custom-file-input @error('foto') is-invalid @enderror" accept="image/*" id="customFile">
                <label class="custom-file-label" for="customFile" data-browse="Procurar">Escolher imagem...</label>
            </div>
            @error('foto') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            
            @if(!empty($carro->foto))
                <div class="mt-3 p-2 border rounded bg-light d-inline-block shadow-sm">
                    <small class="text-muted d-block mb-1 font-weight-bold"><i class="fas fa-image mr-1"></i> Foto cadastrada atualmente:</small>
                    <img src="{{ asset('storage/' . $carro->foto) }}" width="150" class="img-thumbnail rounded">
                </div>
            @endif
        </div>
    </div>
</div>