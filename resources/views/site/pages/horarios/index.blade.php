@extends('adminlte::page')

@section('title', 'HORÁRIOS')

@section('content_header')
<h1>Horários</h1>
@stop

@section('content')
<!---->
<div class="card-body">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th>HORA INÍCIO</th>
                <th>HORA FIM</th>
                <th>VAGAS</th>
                <th>VAGAS DISPONÍVEIS</th>
                <th width="270">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horarios_visitacao as $horario)
                <tr>
                    <td>{{ $horario->id }}</td>
                    {{-- <td>{{ date('d-m-Y', strtotime($horario->horario_visitacao_espacos_data)) }}</td> --}}
                    <td>{{ $horario->horario_visitacao_hora_inicio }}</td>
                    <td>{{ $horario->horario_visitacao_hora_fim }}</td>
                    <td>{{ $horario->horario_visitacao_numero_vagas }}</td>
                    <td>{{ $horario->horario_visitacao_numero_vagas }}</td>
                    <td style="width=10px;">
                        <a href="/visitacoes/listar/{{$horario->id}}" class="btn btn-info" title="Listar">
                            <i class="fas fa-list"></i>
                        </a>
                        <a href="" data-target="#modal-edit-{{$horario->id}}" data-toggle="modal" class="btn btn-warning" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="" data-target="#modal-delete-{{$horario->id}}" data-toggle="modal" class="btn btn-warning" title="Excluir">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    {{-- @include('site.pages.visitacao._partials.modalExcluirHorario')
                    @include('site.pages.visitacao._partials.modalEditarHorario') --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<!---->
@stop