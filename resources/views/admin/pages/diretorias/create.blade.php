@extends('adminlte::page')

@section('title', 'Cadastrar Nova Diretoria')

@section('content_header')
    <h1>Cadastrar Nova Diretoria</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="/diretorias" class="form" method="POST">
                @csrf

                @include('admin.pages.diretorias._partials.form')
            </form>
        </div>
    </div>
@endsection