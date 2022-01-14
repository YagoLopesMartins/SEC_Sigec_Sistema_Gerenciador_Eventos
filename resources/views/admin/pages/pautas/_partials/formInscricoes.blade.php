<div class="form-group">
    <label>Espaço</label>
    <select class="form-control" name="espaco_id" id="">
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
<div class="form-group">
    <label>Vagas:</label>
    <input type="text" name="incricoes_numero_vagas" class="form-control" placeholder="Nome:" 
    value="{{ $pauta->incricoes_numero_vagas ?? old('incricoes_numero_vagas') }}">
</div>
<div class="form-group">
    <label>Limite de dependentes:</label>
    <input type="text" name="incricoes_limite_dependentes" class="form-control" placeholder="Nome:" 
    value="{{ $pauta->incricoes_limite_dependentes ?? old('incricoes_limite_dependentes') }}">
</div>
<div class="form-group">
    <label>Data Inicio:</label>
    <input type="date" name="incricoes_data_inicio" class="form-control" placeholder="Nome:" 
    value="{{ $pauta->incricoes_data_inicio ?? old('incricoes_data_inicio') }}">
</div>
<div class="form-group">
    <label>Hora Inicio:</label>
    <input type="text" name="incricoes_hora_inicio" class="form-control" placeholder="Nome:" 
    value="{{ $pauta->incricoes_hora_inicio ?? old('incricoes_hora_inicio') }}">
</div>
<div class="form-group">
    <label>Data Fim:</label>
    <input type="date" name="incricoes_data_fim" class="form-control" placeholder="Nome:" 
    value="{{ $pauta->incricoes_data_fim ?? old('incricoes_data_fim') }}">
</div>
<div class="form-group">
    <label>Hora Fim:</label>
    <input type="text" name="incricoes_hora_fim" class="form-control" placeholder="Nome:" 
    value="{{ $pauta->incricoes_hora_fim ?? old('incricoes_hora_fim') }}">
</div>
<div class="form-group">
    <label>Observacoes:</label>
    <input type="text" name="incricoes_observacoes" class="form-control" placeholder="Nome:" 
    value="{{ $pauta->incricoes_observacoes ?? old('incricoes_observacoes') }}">
</div>