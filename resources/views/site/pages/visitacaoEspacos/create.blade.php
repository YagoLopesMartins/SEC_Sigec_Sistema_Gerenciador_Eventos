@extends('adminlte::page')

@section('title', 'Cadastrar Novo Horário')

@section('content_header')
    <h1>Cadastrar Novo Horário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/visitacaoEspacos" class="form" method="POST">
                @csrf

                @include('site.pages.visitacaoEspacos._partials.form')
            </form>
        </div>
    </div>
@endsection