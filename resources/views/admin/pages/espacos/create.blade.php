@extends('adminlte::page')

@section('title', 'Cadastrar Novo Espaço')

@section('content_header')
    @include('admin.includes.carrousselImports')    
    <h1>Cadastrar Novo Espaço</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="/espacos" class="form" method="POST">
                @csrf

                @include('admin.pages.espacos._partials.form')
            </form>
        </div>
    </div>
@endsection