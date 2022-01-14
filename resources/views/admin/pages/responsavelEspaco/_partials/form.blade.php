@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="categoria_nome" class="form-control" placeholder="Nome:" 
    value="{{ $categorias->categoria_nome ?? old('categoria_nome') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>