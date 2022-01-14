@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="usuarios" class="active">Usuários</a></li>
    </ol>
    <h1>Listagem das Usuários 
        <a href="usuarios/create" >
            <i class="fas fa-plus-square"></i> 
            Adicionar
        </a>
    </h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <form action="usuarios/search" method="POST" class="form form-inline">
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
                        <th>Login</th>
                        <th>E-mail</th>
                        
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
             
                    @foreach ($usuarios as $usuario)
                        <tr>
                            
                            <td>
                                {{ $usuario->name }}
                            </td>
                            <td>
                                {{ $usuario->usuario_login }}
                            </td>
                            <td>
                                {{ $usuario->email }}
                            </td>
                            
                            <td style="width: 10px;">
                                <a href="usuarios/{{$usuario->id}}/edit" class="btn btn-info" title="Editar">Editar</a>
                                <a href="usuarios/{{$usuario->id}}" class="btn btn-warning" title="Visualizar">Visualizar</a>
                                <a href="{{ route('users.profiles', $usuario->id) }}" title="Perfis" class="btn btn-warning"><i class="fas fa-fw fa-user"></i></a>
                                {{-- <a href="{{ route('usuarios.roles', $usuario->id) }}" title="Cargos" class="btn btn-warning"><i class="fas fa-closed-captioning"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
                {!! $usuarios->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@stop
