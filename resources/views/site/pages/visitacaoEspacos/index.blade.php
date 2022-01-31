
@extends('adminlte::page')

@section('title', 'CRIAR HORÁRIOS')

@section('content_header')
<h1>Criar Horários de visitações</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="/visitacaoEspacosCreate" class="form" method="POST">
            @csrf
                <div class="row">
                    <div class="form-group">
                        <label>Espaço</label>
                        <select class="form-control" name="espaco_id" id="espaco_id">
                            @if($formularioCreate === true)
                                <option value=""> -- Selecione --</option>
                                    @foreach($espacos as $espaco)
                                        <option value="{{ $espaco->espaco_id ?? old('espaco_id') }}">{{$espaco->espaco_nome}}</option>
                                    @endforeach
                            @else
                                @foreach($espacos as $espaco)
                                    @if($espaco->espaco_id === $pauta->espaco_id)
                                        <option value="{{ $espaco->espaco_id ?? old('espaco_id') }}" selected>{{$espaco->espaco_nome}}</option>
                                    @else
                                        <option value="{{ $espaco->espaco_id ?? old('espaco_id') }}">{{$espaco->espaco_nome}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select> 
                    </div>
                </div>
            <div class="row">
                <div class="form-group">
                    <label>Data</label>
                    <input type="date" name="horario_visitacao_espacos_data" 
                    class="form-control" placeholder="Ex.: 22/01/2022" 
                    required
                    value="{{ old('horario_visitacao_espacos_data') }}">
                </div>
                <div class="form-group">
                    <label>Hora Inicio:</label>
                    <input type="text" name="horario_visitacao_espacos_hora_inicio" 
                    class="form-control" placeholder="Ex.: 07:35" 
                    required
                    value="{{ old('horario_visitacao_espacos_hora_inicio') }}">
                </div>
                <div class="form-group">
                    <label>Hora Fim:</label>
                    <input type="text" name="horario_visitacao_espacos_hora_fim" 
                    class="form-control" placeholder="Ex.: 09:35" 
                    required
                    value="{{ old('horario_visitacao_espacos_hora_fim') }}">
                </div>
                <div class="form-group">
                    <label>Quantidade de Vagas:</label>
                    <input type="text" name="horario_visitacao_espacos_numero_vagas" 
                    class="form-control" placeholder="Ex.: 25" 
                    required
                    value="{{ old('horario_visitacao_espacos_numero_vagas') }}">
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
    <!---->
<div class="card-body">
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
</div>
<!---->
</div>
@stop