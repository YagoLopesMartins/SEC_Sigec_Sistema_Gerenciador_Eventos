@include('admin.includes.alerts')

<div class="row">
    <label class="col-sm-3 control-label">Diretoria(*)</label>
    <div class=""> 
        <select class="form-control" name="diretoria_id" id="diretoria_id">
            <option value="">-- Selecione a diretoria --</option>
                @foreach($diretorias as $diretoria)
                    <option value="{{$diretoria->diretoria_id ?? old('diretoria_id') }}">
                        {{$diretoria->diretoria_nome}}
                    </option>
                @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label>Nome:</label>
    <input 
        type="text" 
        name="gerencia_nome" 
        class="form-control" 
        placeholder="Nome:" 
        value="{{ $gerencias->gerencia_nome ?? old('gerencia_nome') }}"
    >
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>