@extends('adminlte::page')

@section('title', 'Cadastrar Novo Orgão')

@section('content_header')
    <h1>Cadastrar Novo Orgão</h1>
@stop

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}
    <div class="card">
        <div class="card-body">
            <form action="/orgaos" class="form" method="POST">
                @csrf

                @include('admin.pages.orgaos._partials.form')
            </form>
        </div>
    </div>
@endsection