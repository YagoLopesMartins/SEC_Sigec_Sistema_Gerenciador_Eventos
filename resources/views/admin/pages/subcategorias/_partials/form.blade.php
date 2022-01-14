@include('admin.includes.alerts')


<div class="row">
    <label class="col-sm-2 control-label">Categoria(*)</label>
    <div class="col-sm-6"> 
        <select class="form-control" name="categoria_id" id="categoria_id" required>
            <option value="">-- Selecione a categoria --</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->categoria_id ?? old('categoria_id') }}">
                        {{$categoria->categoria_nome}}
                    </option>
                @endforeach
        </select>
    </div>
</div>
<div class="row">
    <br/>
        <label class="col-sm-2 control-label">Nome:</label>
        <div class="col-sm-6">
            <input 
                type="text" 
                name="subcategoria_nome" 
                class="form-control" 
                placeholder="Nome:" 
                value="{{ $subcategorias->subcategoria_nome ?? old('subcategoria_nome') }}"
                required
            >
        </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>