@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active">Perfis</a></li>
    </ol>

    <h1>Perfis <a href="{{ route('profiles.create') }}"> 
        <i class="fas fa-plus-square"></i>
         Adicionar</a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Pesquisar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info" title="Editar">Editar</a>
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning" title="Visualizar">Visualizar</a>
                                <a href="{{ route('profiles.permissions', $profile->id) }}" 
                                    class="btn btn-warning"
                                    title="Permissões">
                                    <i class="fas fa-lock"></i>
                                </a>
                                <a href="{{ route('profiles.usuarios', $profile->id) }}" 
                                    class="btn btn-warning"
                                    title="Usuários">
                                    <i class="fas fa-user"></i>
                                </a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
