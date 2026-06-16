@extends('adminlte::page')

@section('title', 'Usuários Cadastrados')

@section('content_header')
    <h1><i class="fas fa-users mr-2" style="color:#e94560;"></i> Usuários Cadastrados</h1>
@stop

@section('content')

    <div class="card bg-white" style="background: #111827 !important; border: 1px solid #1f2d4a !important; border-radius: 12px;">
        <div class="card-header" style="border-bottom: 1px solid #1f2d4a; color: #fff;">
            <h3 class="card-title" style="font-size: 13px; letter-spacing: 1px; text-transform: uppercase; color: #e94560; margin: 0;">
                <i class="fas fa-list mr-2"></i> Gerenciamento de Usuários
            </h3>
        </div>
        
        <div class="card-body">
            @if($usuarios->isEmpty())
                <p style="color:#4a5568;">Nenhum usuário cadastrado no sistema.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover backend-table" style="color: #cbd5e1;">
                        <thead>
                            <tr style="border-bottom: 2px solid #1f2d4a;">
                                <th style="color: #8892b0; font-size: 11px; letter-spacing: 1px; text-transform: uppercase;">Nome</th>
                                <th style="color: #8892b0; font-size: 11px; letter-spacing: 1px; text-transform: uppercase;">E-mail</th>
                                <th style="color: #8892b0; font-size: 11px; letter-spacing: 1px; text-transform: uppercase; text-align: center;">Membro desde</th>
                                <th style="color: #8892b0; font-size: 11px; letter-spacing: 1px; text-transform: uppercase; text-align: center;">Carros</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $user)
                                <tr style="border-bottom: 1px solid #1f2d4a;">
                                    <td style="vertical-align: middle; color: #fff; font-weight: 500;">
                                        <i class="fas fa-user-circle mr-2" style="color: #cbd5e1; opacity: 0.7;"></i> {{ $user->name }}
                                    </td>
                                    <td style="vertical-align: middle;">{{ $user->email }}</td>
                                    <td style="vertical-align: middle; text-align: center; color: #a0aec0;">
                                        <i class="far fa-calendar-alt mr-1" style="font-size: 11px;"></i>
                                        {{ $user->created_at ? $user->created_at->format('d/m/Y') : 'N/A' }}
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <span class="badge" style="background: rgba(233, 69, 96, 0.1); color: #e94560; border: 1px solid rgba(233, 69, 96, 0.2); padding: 5px 10px; font-size: 11px; border-radius: 6px;">
                                            {{ $user->carros->count() ?? 0 }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@stop