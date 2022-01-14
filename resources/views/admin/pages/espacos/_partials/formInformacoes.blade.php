@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="espaco_nome" class="form-control" placeholder=" Ex.: Palácio Rio Negro" required
    value="{{ $espacos->espaco_nome ?? old('espaco_nome') }}">
</div>

<div class="row">
    <div class="form-group">
        <label>Aberto à visitação?:</label>
        <select class="form-control" name="espaco_disponivel_visitacao" id="espaco_disponivel_visitacao" required>
            <option value=""> -- Selecione --</option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
        </select> 
    </div>
</div>

<div class="form-group">
    <label>Informações:</label>
    <textarea class="form-control" name="espaco_informacoes" rows="8" id="espaco_informacoes" 
            placeholder="Ex.: Informações sobre o espaço relevantes, história, horários etc..." 
            value="{{ $espacos->espaco_informacoes ?? old('espaco_informacoes') }}" required>
    </textarea>
</div>