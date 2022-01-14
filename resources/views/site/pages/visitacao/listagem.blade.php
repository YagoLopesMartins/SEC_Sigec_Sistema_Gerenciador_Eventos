@extends('adminlte::page')

@section('title', 'Fábrica do Papai Noel 2021')

@section('content_header')
<h1>Sessões para a Fabrica do Papai Noel</h1>
@stop

@section('content')

<!---->
<div class="card-body">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th>DATA</th>
                <th>HORA CHEGADA</th>
                <th>HORA INÍCIO</th>
                <th>HORA FIM</th>
                {{-- <th>VAGAS</th>
                <th>TOTAL DE INSCRITOS</th> --}}
                <th width="270">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horarios as $horario)
                <tr>
                    <td>{{ $horario->id }}</td>
                    <td><b>{{ $horario->horario_visitacao_data }}</b></td>
                    <td>{{ $horario->horario_visitacao_hora_chegada_estacao }}</td>
                    {{-- <td>{{ date('d-m-Y', strtotime($horario->horario_visitacao_espacos_data)) }}</td> --}}
                    <td><b>{{ $horario->horario_visitacao_hora_inicio }}</b></td>
                    <td>{{ $horario->horario_visitacao_hora_fim }}</td>
                    <td style="width=10px;">
                        <a href="/listagem/inscritos/{{$horario->id}}" class="btn btn-info" title="Lista em PDF">
                            <i class="fas fa-list"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<!---->

@stop