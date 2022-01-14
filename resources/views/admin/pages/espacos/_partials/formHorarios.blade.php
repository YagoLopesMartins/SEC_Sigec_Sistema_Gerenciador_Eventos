@include('admin.includes.alerts')

<div class="form-group">
    <label>Hora de inicio de funcionamento:</label>
    <input type="text" name="espaco_hora_funcionamento_inicio" class="form-control" placeholder="Ex.: 08:00" required
    value="{{ $espacos->espaco_hora_funcionamento_inicio ?? old('espaco_hora_funcionamento_inicio') }}">
</div>
<div class="form-group">
    <label>Hora de fim de funcionamento::</label>
    <input type="text" name="espaco_hora_funcionamento_fim" class="form-control" placeholder="Ex.: 18:00" required
    value="{{ $espacos->espaco_hora_funcionamento_fim ?? old('espaco_hora_funcionamento_fim') }}">
</div>
<div class="form-group">
    <label>Segunda-feira:</label>
    <input type="text" name="espaco_horario_segunda" class="form-control" placeholder=" Ex.: de 08h:00 às 12h:00" required
    value="{{ $espacos->espaco_horario_segunda ?? old('espaco_horario_segunda') }}">
</div>
<div class="form-group">
    <label>Terça-feira:</label>
    <input type="text" name="espaco_horario_terca" class="form-control" placeholder="Ex.: de 08h:00 às 12h:00" required
    value="{{ $espacos->espaco_horario_terca ?? old('espaco_horario_terca') }}">
</div>
<div class="form-group">
    <label>Quarta-feira</label>
    <input type="text" name="espaco_horario_quarta" class="form-control" placeholder="Ex.: de 08h:00 às 12h:00" required
    value="{{ $espacos->espaco_horario_quarta ?? old('espaco_horario_quarta') }}">
</div>
<div class="form-group">
    <label>Quinta-feira:</label>
    <input type="text" name="espaco_horario_quinta" class="form-control" placeholder="Ex.: de 08h:00 às 12h:00" required
    value="{{ $espacos->espaco_horario_quinta ?? old('espaco_horario_quinta') }}">
</div>
<div class="form-group">
    <label>Sexta-feira:</label>
    <input type="text" name="espaco_horario_sexta" class="form-control" placeholder="Ex.: de 08h:00 às 12h:00" required
    value="{{ $espacos->espaco_horario_sexta ?? old('espaco_horario_sexta') }}">
</div>
<div class="form-group">
    <label>Sábado:</label>
    <input type="text" name="espaco_horario_sabado" class="form-control" placeholder="Ex.: de 08h:00 às 12h:00" required
    value="{{ $espacos->espaco_horario_sabado ?? old('espaco_horario_sabado') }}">
</div>
<div class="form-group">
    <label>Domingo:</label>
    <input type="text" name="espaco_horario_domingo" class="form-control" placeholder="Ex.: de 08h:00 às 12h:00" required
    value="{{ $espacos->espaco_horario_domingo ?? old('espaco_horario_domingo') }}">
</div>
