@extends('adminlte::page')

@section('title', 'Carros')

@section('content_header')
    <h1>Carros Cadastrados</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('carros.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Novo Carro
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped"> 
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Cor</th>
                        <th>Placa</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carros as $carro)
                    <tr>
                        <td>
                            @if($carro->foto)
                                <img src="{{ asset('storage/' . $carro->foto) }}" width="60" class="rounded">
                            @else
                                <span class="text-muted">Sem foto</span>
                            @endif
                        </td>
                        <td>{{ $carro->marca }}</td>
                        <td>{{ $carro->modelo }}</td>
                        <td>{{ $carro->ano }}</td>
                        <td>{{ $carro->cor }}</td>
                        <td>{{ $carro->placa }}</td>
                        <td>R$ {{ number_format($carro->preco, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('carros.edit', $carro) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('carros.destroy', $carro) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $carros->links() }}
        </div>
    </div>
@stop