@extends('adminlte::page')

@section('title', "Editar a diretoria {$diretorias->diretoria_nome}")

@section('content_header')
    <h1>Editar a diretoria {{ $diretorias->diretoria_nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/diretorias/{{$diretorias->diretoria_id}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.diretorias._partials.form')
            </form>
        </div>
    </div>
@endsection