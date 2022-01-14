@extends('adminlte::page')

@section('title', 'subcategorias')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="subcategorias" class="active">Subcategorias</a></li>
    </ol>
    <h1>Listagem das Subcategorias 
        <a href="subcategorias/create" >
            <i class="fas fa-plus-square"></i> 
            Adicionar
        </a>
    </h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <form action="subcategorias/search" method="POST" class="form form-inline">
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
                        <th>Categoria</th>
                        
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategorias as $subcat)
                        
                            <tr>
                                <td>
                                    {{ $subcat->subcategoria_nome }}
                                </td>
                                <td>
                                    {{ $subcat->categoria->categoria_nome}}
                                </td>
                                <td style="width: 10px;">
                                    <a href="/subcategorias/{{$subcat->subcategoria_id}}/edit" class="btn btn-info" title="Editar">Editar</a>
                                    <a href="subcategorias/{{$subcat->subcategoria_id}}" class="btn btn-warning" title="Visualizar">Visualizar</a>
                                </td>
                            </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
                {!! $subcategorias->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@stop
