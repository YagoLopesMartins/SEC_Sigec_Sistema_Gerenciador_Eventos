<div class="row">
    <div class="row">
        <div class="form-group">
            <label>Naturalidade:</label>
            <select class="form-control" name="espaco_disponivel_visitacao" id="espaco_disponivel_visitacao" required>
               
                <option value="Brasileiro">Brasileiro</option>
                <option value="Sou Extrangeiro">Sou Extrangeiro</option>
            </select> 
        </div>
    </div>
    <div class="form-group">
        <label>Cpf:</label>
        <input type="text" name="espaco_telefone" class="form-control" placeholder="Ex.: 92 992624522" required
        value="{{ $espacos->espaco_telefone ?? old('espaco_telefone') }}">
    </div>
</div>
<div class="row">
    <div class="form-group">
        <label>Nome Completo:</label>
        <input type="text" name="espaco_telefone" class="form-control" placeholder="Ex.: 92 992624522" required
        value="{{ $espacos->espaco_telefone ?? old('espaco_telefone') }}">
    </div>
    <div class="form-group">
        <label>Data nascimento:</label>
        <input type="email" name="espaco_email" class="form-control" placeholder="Ex.: seuemail@gmail.com" required
        value="{{ $espacos->espaco_email ?? old('espaco_email') }}">
    </div>
</div>
<div class="row">
    <div class="form-group">
        <label>Contato:</label>
        <input type="text" name="espaco_telefone" class="form-control" placeholder="Ex.: 92 992624522" required
        value="{{ $espacos->espaco_telefone ?? old('espaco_telefone') }}">
    </div>
    <div class="form-group">
        <label>E-mail:</label>
        <input type="email" name="espaco_email" class="form-control" placeholder="Ex.: seuemail@gmail.com" required
        value="{{ $espacos->espaco_email ?? old('espaco_email') }}">
    </div>
</div>
<div class="row">
    <div class="row">
        <div class="form-group">
            <label>Você é pessoa com deficiência?:</label>
            <select class="form-control" name="espaco_disponivel_visitacao" id="espaco_disponivel_visitacao" required>
               
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
            </select> 
        </div>
    </div>
    <div class="form-group">
        <label>Informe o tipo de deficiencia:</label>
        <input type="email" name="espaco_email" class="form-control" placeholder="Ex.: seuemail@gmail.com" required
        value="{{ $espacos->espaco_email ?? old('espaco_email') }}">
    </div>
</div>

<div class="form-group">
    <label>Espaço</label>
    <select class="form-control" name="espaco_id" id="">
        <option value=""> -- Selecione --</option>
           @foreach($espacos as $espaco)
            <option value="{{ $espaco->espaco_id ?? old('espaco_id') }}">{{$espaco->espaco_nome}}</option>
           @endforeach
    </select> 
</div>

<div class="row">
    <div class="form-group">
        <label>Dia</label>
        <input type="email" name="espaco_email" class="form-control" placeholder="Ex.: seuemail@gmail.com" required
        value="{{ $espacos->espaco_email ?? old('espaco_email') }}">
    </div>
    <div class="form-group">
        <label>Hora</label>
        <input type="email" name="espaco_email" class="form-control" placeholder="Ex.: seuemail@gmail.com" required
        value="{{ $espacos->espaco_email ?? old('espaco_email') }}">
    </div>
</div>

<button type="submit" class="btn btn-fill btn-success">Agendar minha visita</button>





