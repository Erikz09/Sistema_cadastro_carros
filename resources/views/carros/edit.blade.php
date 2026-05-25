@extends('adminlte::page')

@section('title', 'Editar Carro')

@section('content_header')
    <h1>Editar Carro</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('carros.update', $carro) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('carros._form')
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Atualizar
                </button>
                <a href="{{ route('carros.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop