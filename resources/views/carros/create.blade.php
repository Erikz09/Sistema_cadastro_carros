@extends('adminlte::page')

@section('title', 'Cadastrar Carro')

@section('content_header')
    <h1>Cadastrar Carro</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('carros.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('carros._form')
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Salvar
                </button>
                <a href="{{ route('carros.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop