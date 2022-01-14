@extends('adminlte::page')

@section('title', "Editar a usuário {$usuarios->name}")

@section('content_header')
    <h1>Editar a usuário {{ $usuarios->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/usuarios/{{$usuarios->id}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.usuarios._partials.form')
            </form>
        </div>
    </div>
@endsection