@extends('adminlte::page')

@section('title', 'Meu Perfil: ' . $usuario->name)

@section('content_header')
    <h1><i class="fas fa-user mr-2" style="color:#e94560;"></i> Meu Perfil: {{ $usuario->name }}</h1>
@stop

@section('content')

    <div class="card mb-4" style="background: #111827 !important; border: 1px solid #1f2d4a !important; border-radius: 12px;">
        <div class="card-body">
            <p><span style="color:#8892b0; font-size:11px; letter-spacing:1px; text-transform:uppercase;">E-mail:</span>
               <span style="color:#fff; margin-left:8px;">{{ $usuario->email }}</span></p>
            <p class="mt-2"><span style="color:#8892b0; font-size:11px; letter-spacing:1px; text-transform:uppercase;">Membro desde:</span>
               <span style="color:#fff; margin-left:8px;">{{ $usuario->created_at ? $usuario->created_at->format('d/m/Y') : 'N/A' }}</span></p>
            <p class="mt-2"><span style="color:#8892b0; font-size:11px; letter-spacing:1px; text-transform:uppercase;">Meus Carros Cadastrados:</span>
               <span style="color:#e94560; margin-left:8px; font-weight:bold;">{{ $carros->count() }}</span></p>
        </div>
    </div>

    <div class="card" style="background: #111827 !important; border: 1px solid #1f2d4a !important; border-radius: 12px;">
        <div class="card-header" style="border-bottom: 1px solid #1f2d4a; color: #fff;">
            <i class="fas fa-car mr-2" style="color:#e94560;"></i> Meus Veículos
        </div>
        <div class="card-body">
            @if($carros->isEmpty())
                <p style="color:#4a5568;">Você não possui nenhum carro cadastrado.</p>
            @else
                <table class="table table-bordered table-striped" style="color: #cbd5e1;">
                    <thead>
                        <tr style="color: #8892b0;">
                            <th>Foto</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Ano</th>
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
                            <td>R$ {{ number_format($carro->preco, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop