@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="responsavel_evento_nome" class="form-control" placeholder="Ex.: Seu nome completo" required
    value="{{ $responsavelEventos->responsavel_evento_nome ?? old('responsavel_evento_nome') }}">
</div>
<div class="form-group">
    <label>Empresa:</label>
    <input type="text" name="responsavel_evento_empresa" class="form-control" placeholder="Ex.: AM turismo" required
    value="{{ $responsavelEventos->responsavel_evento_empresa ?? old('responsavel_evento_empresa') }}">
</div>
<div class="form-group">
    <label>Telefone:</label>
    <input type="text" name="responsavel_evento_telefone" class="form-control" placeholder="Ex.: 92 992624522" required
    value="{{ $responsavelEventos->responsavel_evento_telefone ?? old('responsavel_evento_telefone') }}">
</div>
<div class="form-group">
    <label>Telefone2:</label>
    <input type="text" name="responsavel_evento_telefone2" class="form-control" placeholder="Ex.: 92 992624522" 
    value="{{ $responsavelEventos->responsavel_evento_telefone2 ?? old('responsavel_evento_telefone2') }}">
</div>
<div class="form-group">
    <label>Telefone3:</label>
    <input type="text" name="responsavel_evento_telefone3" class="form-control" placeholder="Ex.: 92 992624522" 
    value="{{ $responsavelEventos->responsavel_evento_telefone3 ?? old('responsavel_evento_telefone3') }}">
</div>
<div class="form-group">
    <label>Email:</label>
    <input type="email" name="responsavel_evento_email" class="form-control" placeholder="Ex.: seuemail@provedoremail.com" required
    value="{{ $responsavelEventos->responsavel_evento_email ?? old('responsavel_evento_email') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>