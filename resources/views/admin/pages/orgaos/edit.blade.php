@extends('adminlte::page')

@section('title', "Editar a orgão {$orgaos->orgao_nome}")

@section('content_header')
    <h1>Editar a orgão {{ $orgaos->orgao_nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/orgaos/{{$orgaos->orgao_id}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.orgaos._partials.form')
            </form>
        </div>
    </div>
@endsection