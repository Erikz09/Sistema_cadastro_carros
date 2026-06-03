@extends('adminlte::page')

@section('title', 'Perfil: ' . $usuario->name)

@section('content_header')
    <h1><i class="fas fa-user mr-2" style="color:#e94560;"></i> {{ $usuario->name }}</h1>
@stop

@section('content')

    <div class="card mb-4">
        <div class="card-body">
            <p><span style="color:#8892b0; font-size:11px; letter-spacing:1px; text-transform:uppercase;">E-mail:</span>
               <span style="color:#fff; margin-left:8px;">{{ $usuario->email }}</span></p>
            <p class="mt-2"><span style="color:#8892b0; font-size:11px; letter-spacing:1px; text-transform:uppercase;">Membro desde:</span>
               <span style="color:#fff; margin-left:8px;">{{ $usuario->created_at->format('d/m/Y') }}</span></p>
            <p class="mt-2"><span style="color:#8892b0; font-size:11px; letter-spacing:1px; text-transform:uppercase;">Carros cadastrados:</span>
               <span style="color:#e94560; margin-left:8px; font-weight:bold;">{{ $carros->count() }}</span></p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-car mr-2" style="color:#e94560;"></i> Carros de {{ $usuario->name }}
        </div>
        <div class="card-body">
            @if($carros->isEmpty())
                <p style="color:#4a5568;">Nenhum carro cadastrado.</p>
            @else
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carros as $carro)
                        <tr>
                            <td>
                                @if($carro->foto)
                                    <img src="{{ asset('storage/' . $carro->foto) }}" width="60" class="rounded">
                                @else
                                    <span style="color:#4a5568; font-size:12px;">Sem foto</span>
                                @endif
                            </td>
                            <td>{{ $carro->marca }}</td>
                            <td>{{ $carro->modelo }}</td>
                            <td>{{ $carro->ano }}</td>
                            <td>{{ $carro->cor }}</td>
                            <td>{{ $carro->placa }}</td>
                            <td>R$ {{ number_format($carro->preco, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>

@stop