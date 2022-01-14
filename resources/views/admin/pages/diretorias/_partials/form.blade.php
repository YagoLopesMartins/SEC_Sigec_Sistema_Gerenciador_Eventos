@include('admin.includes.alerts')

<div class="row">
    <label class="col-sm-3 control-label">Orgão(*)</label>
    <div class=""> 
        <select class="form-control" name="orgao_id" id="orgao_id">
            <option value="">-- Selecione o orgão --</option>
                @foreach($orgaos as $orgao)
                    <option value="{{$orgao->orgao_id ?? old('orgao_id') }}">
                        {{$orgao->orgao_nome}}
                    </option>
                @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label>Nome:</label>
    <input 
        type="text" 
        name="diretoria_nome" 
        class="form-control" 
        placeholder="Nome:" 
        value="{{ $diretorias->diretoria_nome ?? old('diretoria_nome') }}"
    >
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>