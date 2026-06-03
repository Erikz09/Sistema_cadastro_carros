@extends('adminlte::page')

@section('title', 'Editar Carro')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-edit mr-2 text-warning"></i>Editar Carro</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card card-outline card-warning elevation-2">
        <div class="card-header">
            <h3 class="card-title">Modificar informações do veículo</h3>
        </div>
        
        <form action="{{ route('carros.update', $carro) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="card-body">
                @include('carros._form')
            </div>
            
            <div class="card-footer bg-light text-right">
                <a href="{{ route('carros.index') }}" class="btn btn-default mr-2">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-warning px-4 font-weight-bold shadow-sm">
                    <i class="fas fa-sync-alt mr-1"></i> Atualizar Dados
                </button>
            </div>
        </form>
    </div>
@stop