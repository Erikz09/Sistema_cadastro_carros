@extends('adminlte::page')

@section('title', 'Cadastrar Carro')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-plus-circle mr-2 text-primary"></i>Novo Carro</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card card-outline card-primary elevation-2">
        <div class="card-header">
            <h3 class="card-title">Preencha as especificações do veículo</h3>
        </div>
        
        <form action="{{ route('carros.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('carros._form')
            </div>
            
            <div class="card-footer bg-light text-right">
                <a href="{{ route('carros.index') }}" class="btn btn-default mr-2">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-success px-4 shadow-sm">
                    <i class="fas fa-save mr-1"></i> Salvar Registro
                </button>
            </div>
        </form>
    </div>
@stop