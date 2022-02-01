@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <!-- <h1>Dashboard administrativo</h1> -->
@stop
 @section('content')
    <div class="row">
      <div class="col-sm-12">
          <h1>
            <strong>Bem vindo ao SIGEC</strong>
          </h1>
          <p>
            <strong>Sistema de Gestão de Pautas</strong>
          </p>
          <img src="{{ asset('imagens/pautas/fundo_SIGEC.png') }}" alt="" width="100%" class="img-fluid">
      </div>
    </div>
 @stop