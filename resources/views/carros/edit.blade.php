@extends('adminlte::page')

@section('title', 'Editar Carro')

@section('content_header')
    <h1 class="m-0">
        <i class="fas fa-edit me-2" style="color:#4d70b8;"></i> Editar Carro
    </h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card" style="background:#111827; border:1px solid #4d70b8; border-radius:12px;">
                <div class="card-body p-4">
                    <form action="{{ route('carros.update', $carro) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        @include('carros._form')
                        <div class="d-flex gap-2 mt-3">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save me-1"></i> Atualizar
                            </button>
                            <a href="{{ route('carros.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop