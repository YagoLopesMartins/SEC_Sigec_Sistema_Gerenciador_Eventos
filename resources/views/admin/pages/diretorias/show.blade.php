  
@extends('adminlte::page')

@section('title', "Detalhes da diretoria {$diretorias->diretoria_nome}")

@section('content_header')
    <h1>Detalhes da diretoria <b>{{ $diretorias->diretoria_nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $diretorias->diretoria_nome }}
                </li>
            </ul>
            <a href="" data-target="#modal-delete-{{$diretorias->diretoria_id}}" data-toggle="modal">
                {{-- <button class="btn btn-danger">Excluir</button> --}}
                <button class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR A DIRETORIA {{ $diretorias->diretoria_nome }}</button>
            </a>
        </div>
        @include('admin.pages.diretorias.modal')
    </div>
@endsection