@extends('adminlte::page')

@section('title', "Detalhes da pauta {$pautas->pauta_id}")

@section('content_header')
    <h1>Detalhes da pauta <b>{{ $pautas->pauta_id }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>ID: </strong> {{ $pautas->pauta_id }}
                </li>
            </ul>
            <a href="" data-target="#modal-delete-{{$pautas->pauta_id}}" data-toggle="modal">
                {{-- <button class="btn btn-danger">Excluir</button> --}}
                <button class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR A PAUTA {{ $pautas->pauta_id }}</button>
            </a>
        </div>
        @include('admin.pages.pautas.modal')
    </div>
@endsection