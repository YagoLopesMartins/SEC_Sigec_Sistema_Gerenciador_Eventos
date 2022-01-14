@extends('adminlte::page')

@section('title', 'Cadastrar Nova SubCategoria')

@section('content_header')
    <h1>Cadastrar Nova SubCategoria</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="/subcategorias" class="form" method="POST">
                @csrf

                @include('admin.pages.subcategorias._partials.form')
            </form>
        </div>
    </div>
@endsection