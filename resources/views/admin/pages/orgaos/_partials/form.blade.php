@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="orgao_nome" class="form-control" placeholder="Nome:" 
    value="{{ $orgaos->orgao_nome ?? old('orgao_nome') }}">
</div>
<div class="form-group">
    <label>Sigla:</label>
    <input type="text" name="orgao_sigla" class="form-control" placeholder="Nome:" 
    value="{{ $orgaos->orgao_sigla ?? old('orgao_sigla') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>