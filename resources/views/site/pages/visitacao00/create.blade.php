@extends('adminlte::page')

@section('title', 'Cadastrar Novo Espaço')

@section('content_header')
    <h1>Cadastrar Novo Espaço</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="/visitacao" class="form" method="POST">
                @csrf

                @include('site.pages.visitacao._partials.form')
            </form>
        </div>
    </div>
@endsection