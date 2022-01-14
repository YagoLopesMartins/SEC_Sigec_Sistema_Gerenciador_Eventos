  
@extends('adminlte::page')

@section('title', "Detalhes da subcategoria {$subcategorias->subcategoria_nome}")

@section('content_header')
    <h1>Detalhes da subcategoria <b>{{ $subcategorias->subcategoria_nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $subcategorias->subcategoria_nome }}
                </li>
            </ul>
            <a href="" data-target="#modal-delete-{{$subcategorias->subcategoria_id}}" data-toggle="modal">
                {{-- <button class="btn btn-danger">Excluir</button> --}}
                <button class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR A SUBCATEGORIA {{ $subcategorias->subcategoria_nome }}</button>
            </a>
        </div>
        @include('admin.pages.subcategorias.modal')
    </div>
@endsection