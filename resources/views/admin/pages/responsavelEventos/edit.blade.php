@extends('adminlte::page')

@section('title', "Editar responsável evento {$responsavelEventos->responsavel_evento_nome}")

@section('content_header')
    <h1>Editar responsável evento {{ $responsavelEventos->responsavel_evento_nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/responsavelEventos/{{$responsavelEventos->responsavel_evento_id}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.responsavelEventos._partials.form')
            </form>
        </div>
    </div>
@endsection