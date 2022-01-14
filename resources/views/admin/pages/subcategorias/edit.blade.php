@extends('adminlte::page')

@section('title', "Editar a subcategoria {$subcategorias->subcategoria_nome}")

@section('content_header')
    <h1>Editar a subcategoria {{ $subcategorias->subcategoria_nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/subcategorias/{{$subcategorias->subcategoria_id}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.subcategorias._partials.form')
            </form>
        </div>
    </div>
@endsection