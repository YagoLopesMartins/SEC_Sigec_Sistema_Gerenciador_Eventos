  
@extends('adminlte::page')

@section('title', "Detalhes da categoria {$categorias->categoria_nome}")

@section('content_header')
    <h1>Detalhes da categoria <b>{{ $categorias->categoria_nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $categorias->categoria_nome }}
                </li>
            </ul>
            <form action="/categorias/{{$categorias->categoria_id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR A CATEGORIA {{ $categorias->categoria_nome }}</button>
            </form>
        </div>
    </div>
@endsection