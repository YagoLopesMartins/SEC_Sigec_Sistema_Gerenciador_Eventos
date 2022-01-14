@extends('adminlte::page')

@section('title', 'Cadastrar Nova Gerência')

@section('content_header')
    <h1>Cadastrar Nova Gerência</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="/gerencias" class="form" method="POST">
                @csrf

                @include('admin.pages.gerencias._partials.form')
            </form>
        </div>
    </div>
@endsection