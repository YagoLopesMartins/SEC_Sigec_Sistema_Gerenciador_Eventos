@extends('adminlte::page')

@section('title', "Editar a categoria {$categorias->categoria_nome}")

@section('content_header')
    <h1>Editar a categoria {{ $categorias->categoria_nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/categorias/{{$categorias->categoria_id}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.categorias._partials.form')
            </form>
        </div>
    </div>
@endsection