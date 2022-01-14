@extends('adminlte::page')

@section('title', "Planos do perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.usuarios', $profile->id) }}" class="active">Usuários</a></li>
    </ol>

    <h1>Planos do usuário <strong>{{ $profile->name }}</strong></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>
                                {{ $usuario->usuario_nome }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('usuarios.profile.detach', [$usuario->usuario_id, $profile->id]) }}" class="btn btn-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $usuarios->appends($filters)->links() !!}
            @else
                {!! $usuarios->links() !!}
            @endif
        </div>
    </div>
@stop
