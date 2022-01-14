@extends('adminlte::page')

@section('title', "Editar a Espaco {$espacos->espaco_nome}")

@section('content_header')
    @include('admin.includes.carrousselImports')    
    <h1>Editar a espaco {{ $espacos->espaco_nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/espacos/{{$espacos->espaco_id}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.espacos._partials.form')
            </form>
        </div>
    </div>
@endsection