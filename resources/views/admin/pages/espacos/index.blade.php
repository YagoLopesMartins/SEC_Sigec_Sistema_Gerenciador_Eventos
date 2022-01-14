@extends('adminlte::page')

@section('title', 'Espacos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="espacos" class="active">Espacos</a></li>
    </ol>
    <h1>Listagem das Espacos 
        <a href="espacos/create" >
            <i class="fas fa-plus-square"></i> 
            Adicionar
        </a>
    </h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <form action="espacos/search" method="POST" class="form form-inline">
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
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Email</th>
                        <th>Disponível visitação</th>
                        
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
             
                    @foreach ($espacos as $espacos)
                        <tr>
                            <td>
                                {{ $espacos->espaco_id }}
                            </td>
                            <td>
                                {{ $espacos->espaco_nome }}
                            </td>
                            <td>
                                {{ $espacos->espaco_endereco }}
                            </td>
                            <td>
                                {{ $espacos->espaco_email }}
                            </td>
                            <td>
                                {{ $espacos->espaco_disponivel_visitacao }}
                            </td>
                            
                            <td style="width: 10px;">
                                <a href="/espacos/{{$espacos->espaco_id}}/edit" class="btn btn-info" title="Editar">Editar</a>
                                <a href="espacos/{{$espacos->espaco_id}}" class="btn btn-warning" title="Visualizar">Visualizar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
             {{-- {!! $espacos->links() !!} --}}
             {{-- {!! $espacos->links("pagination::bootstrap-4") !!} --}}
        </div>
    </div>
@stop
