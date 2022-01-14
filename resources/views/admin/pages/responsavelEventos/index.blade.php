@extends('adminlte::page')

@section('title', 'Responsaveis Evento')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="responsavelEventos" class="active">Responsaveis Evento</a></li>
    </ol>
    <h1>Listagem dos Responsaveis Evento 
        <a href="responsavelEventos/create" >
            <i class="fas fa-plus-square"></i> 
            Adicionar
        </a>
    </h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <form action="responsavelEventos/search" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button type="submit" class="btn btn-dark">Pesquisar</button>
        </form>
    </div>
        
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Empresa</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
             
                    @foreach ($responsavelEventos as $resp_evento)
                        <tr>
                            <td>
                                {{ $resp_evento->responsavel_evento_nome }}
                            </td>
                            <td>
                                {{ $resp_evento->responsavel_evento_empresa }}
                            </td>
                            <td>
                                {{ $resp_evento->responsavel_evento_telefone }}
                            </td>
                            <td>
                                {{ $resp_evento->responsavel_evento_email }}
                            </td>
                            
                            <td style="width: 10px;">
                                <a href="responsavelEventos/{{$resp_evento->responsavel_evento_id}}/edit" class="btn btn-info" title="Editar">Editar</a>
                                <a href="responsavelEventos/{{$resp_evento->responsavel_evento_id}}" class="btn btn-warning" title="Visualizar">Visualizar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
                {!! $responsavelEventos->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@stop
