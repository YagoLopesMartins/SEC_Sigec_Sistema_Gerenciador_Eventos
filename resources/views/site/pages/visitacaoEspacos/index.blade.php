
@extends('adminlte::page')

@section('title', 'SIGEC - AgendaVisita')

@section('content_header')
  
    <h1>LISTA DE HORÁRIOS</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="/visitacao/espacos/create" class="form" method="POST">
            @csrf
                <div class="row">
                    <div class="form-group">
                        <label>Espaço</label>
                        <select class="form-control" name="espaco_id" id="espaco_id">
                            <option value=""> -- Selecione --</option>
                                @foreach($espacos as $espaco)
                                    <option value="{{ $espaco->espaco_id ?? old('espaco_id') }}">{{$espaco->espaco_nome}}</option>
                                @endforeach
                        </select> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label>Data</label>
                        <input type="date" name="horario_visitacao_data" 
                            class="form-control" placeholder="Ex.: 22/01/2022" 
                            value="{{ old('horario_visitacao_espacos_data') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Hora Inicio:</label>
                        <input type="text" name="horario_visitacao_hora_inicio" 
                            class="form-control" placeholder="Ex.: 07:35" 
                            value="{{ old('horario_visitacao_espacos_hora_inicio') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Hora Fim:</label>
                        <input type="text" name="horario_visitacao_hora_fim" 
                            class="form-control" placeholder="Ex.: 09:35" 
                            value="{{ old('horario_visitacao_espacos_hora_fim') }}" required> 
                    </div>
                    <div class="form-group">
                        <label>Quantidade de Vagas:</label>
                        <input type="text" name="horario_visitacao_numero_vagas" 
                            class="form-control" placeholder="Ex.: 25" 
                            value="{{ old('horario_visitacao_espacos_numero_vagas') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label>Observacoes:</label>
                        <textarea type="text" rows="3" cols="8"
                            name="horario_visitacao_espacos_observacoes" 
                            class="form-control" placeholder="" 
                            value="">
                        </textarea>
                    </div>
                </div>
                <div class="col m-lg-auto">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </div>
        </form>
    </div>
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
    <!-- <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>ESPAÇO ID</th>
                    <th>DATA</th>
                    <th>HORA INÍCIO</th>
                    <th>HORA FIM</th>
                    <th>VAGAS</th>
                    <th>OBS</th>
                    <th width="270">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horarios_visitacao_espacos as $hve)
                    <tr>
                        <td>{{ $hve->espaco_id }}</td>
                        <td>{{ $hve->horario_visitacao_espacos_data }}</td>
                        <td>{{ $hve->horario_visitacao_espacos_hora_inicio }}</td>
                        <td>{{ $hve->horario_visitacao_espacos_hora_fim }}</td>
                        <td>{{ $hve->horario_visitacao_espacos_numero_vagas }}</td>
                        <td>{{ $hve->horario_visitacao_espacos_observacoes }}</td>
                        <td style="width=10px;">
                            <a href="#" target="_blank" class="btn btn-info" title="Listar">
                                <i class="fas fa-qrcode"></i>
                            </a>
                            <a href="#" class="btn btn-info" title="Listar">
                                <i class="fas fa-list"></i>
                            </a>
                            <a href="#" class="btn btn-warning" title="Excluir">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> -->
<!---->
</div>
@stop

