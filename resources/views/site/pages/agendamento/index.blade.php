@extends('adminlte::page')

@section('title', 'Agendamento')

@section('content_header')
    <link rel="stylesheet" href=" {{ url('css/lista-eventos.css') }}">
    <h1>Programação de eventos</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            {{-- <div class="card" style="width: 18rem;">
                <img class="card-img-top" src=" {{ url('imagens/pautas/download.jpg') }} " alt="Card image cap" width="200px" height="200px">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div> --}}
            <ul id="lista-eventos">
                <li id="evento01"><span>Agenda Cultural 352 anos</span></li>
            </ul>  
        </div>
    </div>
@stop
