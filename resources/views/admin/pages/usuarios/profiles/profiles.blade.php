@extends('adminlte::page')

@section('title', "Perfis do usuário {$user->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/usuarios">Usuários</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.profiles', $user->id) }}" class="active">Perfis</a></li>
    </ol>

    <h1>Perfis do usuário <strong>{{ $user->name }}</strong></h1>

    <a href="{{ route('users.profiles.available', $user->id) }}" class="btn btn-dark">ADD NOVO PERFIL</a>

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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('users.profile.detach', [$user->id, $profile->id]) }}" class="btn btn-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {{-- {!! $profiles->appends($filters)->links() !!} --}}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop