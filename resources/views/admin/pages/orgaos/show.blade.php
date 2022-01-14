  
@extends('adminlte::page')

@section('title', "Detalhes da orgão {$orgaos->orgao_nome}")

@section('content_header')
    <h1>Detalhes da orgão <b>{{ $orgaos->orgao_nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $orgaos->orgao_nome }}
                </li>
            </ul>
        
            <a href="" data-target="#modal-delete-{{$orgaos->orgao_id}}" data-toggle="modal">
                {{-- <button class="btn btn-danger">Excluir</button> --}}
                <button class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O ORGÂO {{ $orgaos->orgao_nome }}</button>
            </a>
        </div>
        @include('admin.pages.orgaos.modal')
    </div>
@endsection