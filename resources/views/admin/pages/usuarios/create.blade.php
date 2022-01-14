@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuário')

@section('content_header')
    <h1>Cadastrar Novo Usuário</h1>
@stop

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}
    <div class="card">
        <div class="card-body">
            <form action="/usuarios" class="form" method="POST">
                @csrf

                @include('admin.pages.usuarios._partials.form')
            </form>
        </div>
    </div>
@endsection