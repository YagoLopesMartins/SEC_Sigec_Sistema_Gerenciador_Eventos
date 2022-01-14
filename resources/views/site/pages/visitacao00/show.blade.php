@extends('adminlte::page')

@section('title', "Detalhes da espaco {$espacos->espaco_nome}")

@section('content_header')
    <h1>Detalhes da espaco <b>{{ $espacos->espaco_nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Informações do espaço</h3>
            <ul>
                <li><strong>Nome: </strong> {{ $espacos->espaco_nome }}</li>
                <li><strong>Inicio de funcionamento: </strong> {{ $espacos->espaco_hora_funcionamento_inicio }}</li>
                <li><strong>Fim de funcionamento: </strong> {{ $espacos->espaco_hora_funcionamento_fim }}</li>
                <li><strong>Endereço: </strong> {{ $espacos->espaco_endereco }}</li>
                <li><strong>Informações: </strong> {{ $espacos->espaco_informacoes }}</li>
                <li><strong>Telefone: </strong> {{ $espacos->espaco_telefone }}</li>
                <li><strong>E-mail: </strong> {{ $espacos->espaco_email }}</li>
                <li><strong>Disponivel visitação ?: </strong> {{ $espacos->espaco_disponivel_visitacao }}</li>
            </ul>
            
        </div>
        <div class="card-body">
            <h3>Horários</h3>
            <ul>
                <li><strong>Segunda: </strong> {{ $espacos->espaco_horario_segunda }}</li>
                <li><strong>Terça: </strong> {{ $espacos->espaco_horario_terca }}</li>
                <li><strong>Quarta: </strong> {{ $espacos->espaco_horario_quarta }}</li>
                <li><strong>Quinta: </strong> {{ $espacos->espaco_horario_quinta }}</li>
                <li><strong>Sexta: </strong> {{ $espacos->espaco_horario_sexta }}</li>
                <li><strong>Sábado: </strong> {{ $espacos->espaco_horario_sexta }}</li>
                <li><strong>Domingo: </strong> {{ $espacos->espaco_horario_domingo }}</li>
  
            </ul>
           
            <a href="" data-target="#modal-delete-{{$espacos->espaco_id}}" data-toggle="modal">
                {{-- <button class="btn btn-danger">Excluir</button> --}}
                <button class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O ESPAÇO {{ $espacos->espaco_nome }}</button>
            </a>
        </div>
        @include('admin.pages.espacos.modal')
    </div>
@endsection