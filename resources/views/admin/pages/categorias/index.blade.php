@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="categorias" class="active">Categorias</a></li>
    </ol>
    <h1>Listagem das Categorias 
        <a href="categorias/create" >
            <i class="fas fa-plus-square"></i> 
            Adicionar
        </a>
    </h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <form action="categorias/search" method="POST" class="form form-inline">
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
                        
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
             
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>
                                {{ $categoria->categoria_nome }}
                            </td>
                            
                            <td style="width: 10px;">
                                <a href="/categorias/{{$categoria->categoria_id}}/edit" class="btn btn-info" title="Editar">Editar</a>
                                <a href="categorias/{{$categoria->categoria_id}}" class="btn btn-warning" title="Visualizar">Visualizar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
                {!! $categorias->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@stop
