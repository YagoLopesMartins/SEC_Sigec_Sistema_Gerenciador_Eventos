@extends('adminlte::page')

@section('title', 'Cadastrar Novo Responsável evento')

@section('content_header')
    <h1>Cadastrar Novo Responsável evento</h1>
@stop

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}
    <div class="card">
        <div class="card-body">
            <form action="/responsavelEventos" class="form" method="POST">
                @csrf

                @include('admin.pages.responsavelEventos._partials.form')
            </form>
        </div>
    </div>
@endsection