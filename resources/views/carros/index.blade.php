@extends('adminlte::page')

@section('title', 'Carros')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-car mr-2"></i>Carros Cadastrados</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('carros.create') }}" class="btn btn-success elevation-2">
                    <i class="fas fa-plus-circle mr-1"></i> Cadastrar Novo Carro
                </a>
            </div>
        </div>
    </div>
@stop

@section('content')
    {{-- Mensagens de Sucesso --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show elevation-1" role="alert">
            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Mensagens de Erro (Caso adicione validações futuras) --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show elevation-1" role="alert">
            <h5><i class="icon fas fa-ban"></i> Erro!</h5>
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card card-outline card-primary elevation-2">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped m-0 align-middle" style="vertical-align: middle;"> 
                    <thead class="thead-dark">
                        <tr>
                            <th width="100" class="text-center">Foto</th>
                            <th>Marca / Modelo</th>
                            <th class="text-center">Ano</th>
                            <th>Cor</th>
                            <th class="text-center">Placa</th>
                            <th>Preço</th>
                            <th width="120" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($carros as $carro)
                        <tr>
                            <td class="text-center align-middle">
                                @if($carro->foto)
                                    <img src="{{ asset('storage/' . $carro->foto) }}" alt="Foto" width="70" class="img-thumbnail shadow-sm">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center mx-auto shadow-sm" style="width: 70px; height: 45px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="align-middle">
                                <span class="font-weight-bold text-capitalize text-primary">{{ $carro->marca }}</span>
                                <small class="d-block text-muted text-uppercase">{{ $carro->modelo }}</small>
                            </td>
                            <td class="text-center align-middle">
                                <span class="badge badge-secondary px-2 py-1.5">{{ $carro->ano }}</span>
                            </td>
                            <td class="align-middle text-capitalize">
                                <i class="fas fa-palette mr-1 text-muted"></i> {{ $carro->cor }}
                            </td>
                            <td class="text-center align-middle">
                                @if($carro->placa && strtolower($carro->placa) !== 'não-tem')
                                    <span class="badge badge-dark font-weight-bold px-2 py-1" style="letter-spacing: 1px;">
                                        {{ strtoupper($carro->placa) }}
                                    </span>
                                @else
                                    <span class="badge badge-light border text-muted">Sem Placa</span>
                                @endif
                            </td>
                            <td class="align-middle text-success font-weight-bold">
                                R$ {{ number_format($carro->preco, 2, ',', '.') }}
                            </td>
                            <td class="text-center align-middle">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('carros.edit', $carro) }}" class="btn btn-sm btn-info" title="Editar Carro">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('carros.destroy', $carro) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Excluir Carro" onclick="return confirm('Tem certeza que deseja excluir este veículo?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fas fa-car-crash fa-3x mb-3 d-block"></i>
                                Nenhum carro cadastrado no momento.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($carros->hasPages())
            <div class="card-footer clearfix bg-white">
                <div class="float-right">
                    {{ $carros->links() }}
                </div>
            </div>
        @endif
    </div>
@stop

