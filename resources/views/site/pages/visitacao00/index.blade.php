@extends('adminlte::page')

@section('title', 'Visitação')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="visitacoes" class="active">Visitação</a></li>
    </ol>
    <h1>Listagem das Visitação 
        <a href="visitacoes/create">
            <i class="fas fa-plus-square"></i> 
            Adicionar
        </a>
    </h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <form action="visitacoes/search" method="POST" class="form form-inline">
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
                        <th>Documento</th>
                        <th>Contato</th>
                        <th>Deficiencia</th>
                        <th>Presença</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
             
                    @foreach ($visitacao as $visita)
                        <tr>
                            <td>
                                {{ $visita->nome_completo }}
                            </td>
                            <td>
                                {{ $visita->cpf }}
                            </td>
                            <td>
                                {{ $visita->contato }}
                            </td>
                            <td>
                                {{ $visita->deficiente }}
                            </td>
                            <td>
                                {{ $visita->presenca }}
                            </td>
                            
                            <td style="width: 10px;">
                                <a href="/visitacoes/{{$visitacoes->visitante_espaco_id }}/edit" class="btn btn-info" title="Editar">Editar</a>
                                <a href="visitacoes/{{$visitacoes->visitante_espaco_id }}" class="btn btn-warning" title="Visualizar">Visualizar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
                {{-- {!! $visitacoes->links("pagination::bootstrap-4") !!} --}}
        </div>
    </div>
@stop
