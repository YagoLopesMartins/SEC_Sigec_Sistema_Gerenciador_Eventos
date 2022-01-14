@extends('adminlte::page')

@section('title', "Detalhes da gerencia {$gerencias->gerencia_nome}")

@section('content_header')
    <h1>Detalhes da gerencia <b>{{ $gerencias->gerencia_nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $gerencias->gerencia_nome }}
                </li>
            </ul>
            <a href="" data-target="#modal-delete-{{$gerencias->gerencia_id}}" data-toggle="modal">
                {{-- <button class="btn btn-danger">Excluir</button> --}}
                <button class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR A GERÊNCIA {{ $gerencias->gerencia_nome }}</button>
            </a>
        </div>
        @include('admin.pages.gerencias.modal')
    </div>
@endsection