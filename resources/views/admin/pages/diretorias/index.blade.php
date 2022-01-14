@extends('adminlte::page')

@section('title', 'diretorias')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="diretorias" class="active">Diretorias</a></li>
    </ol>
    <h1>Listagem das Diretorias 
        <a href="diretorias/create" >
            <i class="fas fa-plus-square"></i> 
            Adicionar
        </a>
    </h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <form action="diretorias/search" method="POST" class="form form-inline">
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
                        <th>Orgão</th>
                        
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diretorias as $diretoria)
                        
                            <tr>
                                <td>
                                    {{ $diretoria->diretoria_nome }}
                                </td>
                                <td>
                                    {{ $diretoria->orgao->orgao_nome }}
                                </td>
                                <td style="width: 10px;">
                                    <a href="/diretorias/{{$diretoria->diretoria_id}}/edit" class="btn btn-info" title="Editar">Editar</a>
                                    <a href="diretorias/{{$diretoria->diretoria_id}}" class="btn btn-warning" title="Visualizar">Visualizar</a>
                                </td>
                            </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
                {!! $diretorias->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@stop
