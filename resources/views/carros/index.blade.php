@extends('adminlte::page')

@section('title', 'Carros')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">
            <i class="fas fa-car me-2" style="color:#e94560;"></i> Carros Cadastrados
        </h1>
        <a href="{{ route('carros.create') }}" class="btn btn-danger btn-sm">
            <i class="fas fa-plus me-1"></i> Novo Carro
        </a>
    </div>
@stop

@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">
        @forelse($carros as $carro)
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card h-100 shadow-sm" style="background:#111827; border:1px solid #1f2d4a; border-radius:12px; overflow:hidden;">

                {{-- Imagem --}}
                @if($carro->foto)
                    <img src="{{ asset('storage/' . $carro->foto) }}"
                         alt="{{ $carro->marca }}"
                         style="width:100%; height:200px; object-fit:cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center"
                         style="height:200px; background:#0d1220; border-bottom:1px solid #1f2d4a;">
                        <i class="fas fa-car" style="font-size:48px; color:#1f2d4a;"></i>
                    </div>
                @endif

                <div class="card-body" style="color:#cbd5e1;">
                    <span class="badge mb-2" style="background:rgba(233,69,96,.15); color:#e94560; font-size:10px; letter-spacing:2px;">
                        {{ $carro->ano }}
                    </span>
                    <h5 class="card-title mb-0" style="font-family:Georgia,serif; color:#fff;">
                        {{ $carro->marca }}
                    </h5>
                    <p class="text-secondary small mb-3">{{ $carro->modelo }}</p>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div style="font-size:9px; letter-spacing:1px; text-transform:uppercase; color:#4a5568;">Cor</div>
                            <div style="font-size:13px;">{{ $carro->cor }}</div>
                        </div>
                        <div class="col-6">
                            <div style="font-size:9px; letter-spacing:1px; text-transform:uppercase; color:#4a5568;">Placa</div>
                            <div style="font-size:13px;">{{ $carro->placa }}</div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-2"
                         style="border-top:1px solid #1f2d4a;">
                        <span style="font-family:Georgia,serif; font-size:17px; color:#e94560; font-weight:700;">
                            R$ {{ number_format($carro->preco, 2, ',', '.') }}
                        </span>
                        @if(isset($carro->user))
                        <span style="font-size:11px; color:#4a5568;">
                            <i class="fas fa-user me-1" style="color:#e94560;"></i>{{ $carro->user->name }}
                        </span>
                        @endif
                    </div>
                </div>

                {{-- Ações --}}
                @if(auth()->user()->isAdmin() || $carro->user_id === auth()->id())
                <div class="card-footer d-flex gap-2" style="background:#0d1220; border-top:1px solid #1f2d4a;">
                    <a href="{{ route('carros.edit', $carro) }}"
                       class="btn btn-warning btn-sm flex-fill">
                        <i class="fas fa-edit me-1"></i> Editar
                    </a>
                    <form action="{{ route('carros.destroy', $carro) }}" method="POST" class="flex-fill">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm w-100"
                                onclick="return confirm('Deseja excluir este carro?')">
                            <i class="fas fa-trash me-1"></i> Excluir
                        </button>
                    </form>
                </div>
                @endif

            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="fas fa-car" style="font-size:64px; color:#1f2d4a;"></i>
            <h4 class="mt-3" style="color:#fff;">Nenhum carro cadastrado ainda</h4>
            <p class="text-secondary">Clique em "Novo Carro" para começar.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $carros->links('pagination::bootstrap-5') }}
    </div>

@stop