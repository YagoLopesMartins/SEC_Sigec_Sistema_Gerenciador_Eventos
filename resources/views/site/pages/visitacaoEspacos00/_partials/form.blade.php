<div class="card">
    <div class="card-body">
        <form action="/visitacaoEspacosCreate" class="form" method="POST">
            @csrf
            <div class="row">
                <div class="form-group">
                    <label>Data</label>
                    <input type="date" name="horario_visitacao_espacos_data" class="form-control" placeholder="Nome:" 
                    value="{{ old('horario_visitacao_espacos_data') }}">
                </div>
                <div class="form-group">
                    <label>Hora Inicio:</label>
                    <input type="text" name="horario_visitacao_espacos_hora_inicio" class="form-control" placeholder="Nome:" 
                    value="{{ old('horario_visitacao_espacos_hora_inicio') }}">
                </div>
                <div class="form-group">
                    <label>Hora Fim:</label>
                    <input type="text" name="horario_visitacao_espacos_hora_fim" class="form-control" placeholder="Nome:" 
                    value="{{ old('horario_visitacao_espacos_hora_fim') }}">
                </div>
                <div class="form-group">
                    <label>Vagas:</label>
                    <input type="text" name="horario_visitacao_espacos_numero_vagas" class="form-control" placeholder="Nome:" 
                    value="{{ old('horario_visitacao_espacos_numero_vagas') }}">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group">
                    <label>Observacoes:</label>
                    <input type="text" name="horario_visitacao_espacos_observacoes" class="form-control" placeholder="Nome:" 
                    value="{{ old('horario_visitacao_espacos_observacoes') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
