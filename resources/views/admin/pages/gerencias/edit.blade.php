@extends('adminlte::page')

@section('title', "Editar a gerencia {$gerencias->gerencia_nome}")

@section('content_header')
    <h1>Editar a gerencia {{ $gerencias->gerencia_nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/gerencias/{{$gerencias->gerencia_id}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.gerencias._partials.form')
            </form>
        </div>
    </div>
@endsection