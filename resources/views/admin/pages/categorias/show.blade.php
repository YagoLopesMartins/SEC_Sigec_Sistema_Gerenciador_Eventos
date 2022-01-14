  
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
            <a href="" data-target="#modal-delete-{{$categorias->categoria_id}}" data-toggle="modal">
                {{-- <button class="btn btn-danger">Excluir</button> --}}
                <button class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR A CATEGORIA {{ $categorias->categoria_nome }}</button>
            </a>
        </div>
        @include('admin.pages.categorias.modal')
    </div>
@endsection