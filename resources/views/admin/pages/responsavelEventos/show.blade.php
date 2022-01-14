  
@extends('adminlte::page')

@section('title', "Detalhes da responsável evento {$responsavelEventos->responsavel_evento_nome}")

@section('content_header')
    <h1>Detalhes da responsável evento <b>{{ $responsavelEventos->responsavel_evento_nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $responsavelEventos->responsavel_evento_nome }}
                </li>
            </ul>
            <a href="" data-target="#modal-delete-{{$responsavelEventos->responsavel_evento_id}}" data-toggle="modal">
                {{-- <button class="btn btn-danger">Excluir</button> --}}
                <button class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR RESPONSÀVEL EVENTO {{ $responsavelEventos->responsavel_evento_nome }}</button>
            </a>
        </div>
        @include('admin.pages.responsavelEventos.modal')
    </div>
@endsection