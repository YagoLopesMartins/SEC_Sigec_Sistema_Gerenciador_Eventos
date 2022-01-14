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
<div class="form-group">
    <label>Data Inicio:</label>
    <input type="date" name="agenda_data_inicio" class="form-control" placeholder="Nome:" 
    value="{{ $pauta->agenda_data_inicio ?? old('agenda_data_inicio') }}">
</div>
<div class="form-group">
    <label>Hora Inicio:</label>
    <input type="text" name="agenda_hora_inicio" class="form-control" placeholder="Nome:" 
    value="{{ $pauta->agenda_hora_inicio ?? old('agenda_hora_inicio') }}">
</div>
<div class="form-group">
    <label>Data Fim:</label>
    <input type="date" name="agenda_data_fim" class="form-control" placeholder="Nome:" 
    value="{{ $pauta->agenda_data_fim ?? old('agenda_data_fim') }}">
</div>
<div class="form-group">
    <label>Hora Fim:</label>
    <input type="text" name="agenda_hora_fim" class="form-control" placeholder="Nome:" 
    value="{{ $pauta->agenda_hora_fim ?? old('agenda_hora_fim') }}">
</div>