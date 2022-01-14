@extends('adminlte::page')

@section('title', 'Cadastrar Nova Categoria')

@section('content_header')
    <h1>Cadastrar Nova Categoria</h1>
@stop

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}
    <div class="card">
        <div class="card-body">
            <form action="/categorias" class="form" method="POST">
                @csrf

                @include('admin.pages.categorias._partials.form')
            </form>
        </div>
    </div>
@endsection