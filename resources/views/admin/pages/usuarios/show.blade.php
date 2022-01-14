@extends('adminlte::page')

@section('title', "Detalhes da usuário {$usuarios->name}")

@section('content_header')
    <h1>Detalhes da usuário <b>{{ $usuarios->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $usuarios->name }}
                </li>
            </ul>
           
            <a href="" data-target="#modal-delete-{{$usuarios->id}}" data-toggle="modal">
                {{-- <button class="btn btn-danger">Excluir</button> --}}
                <button class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O USUÁRIO {{ $usuarios->name }}</button>
            </a>
        </div>
        @include('admin.pages.usuarios.modal')
    </div>
@endsection