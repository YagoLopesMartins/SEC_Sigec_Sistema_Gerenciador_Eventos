<div class="row">
    <label class="col-sm-3 control-label">Secretaria(*)</label>
    <div class="col-sm-8"> 

        <select class="form-control" name="secretaria_orgao" id="secretaria_orgao" required>
            @if($formularioCreate === true)
                <option value="">-- Selecione um orgão --</option>
                    @foreach($orgaos as $orgao)
                            <option value="{{ $orgao->orgao_id ?? old('secretaria_orgao') }} ">{{$orgao->orgao_nome}}</option>
                    @endforeach
            @else
        '           @foreach($orgaos as $orgao)
                        @if($orgao->orgao_nome === $pauta->secretaria_orgao)
                            <option value=" {{ $orgao->orgao_id ?? old('secretaria_orgao') }} " selected>{{ $orgao->orgao_nome }}</option>    
                        @else
                            <option value="{{ $orgao->orgao_id ?? old('secretaria_orgao') }} ">{{ $orgao->orgao_nome }}</option>
                        @endif
                    @endforeach ' 
            @endif
        </select>
    </div>
</div>
<div class="row">
    <label class="col-sm-3 control-label">Diretoria(*)</label>
    <div class="col-sm-8">
        <select class="form-control" name="diretoria_id" id="diretoria_id" required>
            @if($formularioCreate === true)
                <option value=""> -- Selecione uma diretoria --</option>
                    @foreach($diretorias as $diretoria)
                        <option value="{{$diretoria->diretoria_id ?? old('diretoria_id')}}">{{$diretoria->diretoria_nome}}</option>
                    @endforeach
            @else
                    @foreach($diretorias as $diretoria)
                        @if($diretoria->diretoria_id === $pauta->diretoria_id)
                            <option value="{{$diretoria->diretoria_id ?? old('diretoria_id')}}" selected>{{$diretoria->diretoria_nome}}</option>
                        @else
                            <option value="{{$diretoria->diretoria_id ?? old('diretoria_id')}}">{{$diretoria->diretoria_nome}}</option>
                        @endif
                    @endforeach
            @endif
        </select>
    </div>
</div>
<div class="row">
    <label class="col-sm-3 control-label">Gerência(*)</label>
    <div class="col-sm-8">
        <select class="form-control" name="gerencia_id" id="gerencia_id" required>
            @if($formularioCreate === true)
                <option value=""> -- Selecione uma gerência --</option>
                    @foreach($gerencias as $gerencia)
                        <option value="{{$gerencia->gerencia_id ?? old('gerencia_id') }}">{{$gerencia->gerencia_nome}}</option>
                    @endforeach    
            @else
                    @foreach($gerencias as $gerencia)
                        @if ($gerencia->gerencia_id === $pauta->gerencia_id)
                            <option value="{{$gerencia->gerencia_id ?? old('gerencia_id') }}" selected>{{$gerencia->gerencia_nome}}</option>
                        @else
                            <option value="{{$gerencia->gerencia_id ?? old('gerencia_id') }}">{{$gerencia->gerencia_nome}}</option>
                        @endif
                    @endforeach 
            @endif
        </select> 
    </div>
</div>
<div class="row">
<label class="col-sm-3 control-label">Núm.Doc.Físico</label>
<div class="col-sm-8">
    <input type="text" name="numero_documento_fisico" 
    class="form-control" placeholder="número do Memo, Ofício e etc..."
    value="{{ $pauta->numero_documento_fisico ?? old('numero_documento_fisico') }}">
</div>
</div>
<div class="row">
<label class="col-sm-3 control-label">Título(*)</label>
<div class="col-sm-8">
    <input type="text" name="titulo" 
        class="form-control" placeholder="Título ainda não disponível"
        value="{{ $pauta->titulo ?? old('titulo') }}" required>
</div>
</div>
<div class="row">
<label class="col-sm-3 control-label">Descrição(*)</label>
<div class="col-sm-8">
    <textarea   name="descricao" rows="8" id="descricao" 
        class="form-control" placeholder="" 
        value="" required>
        {{ $pauta->descricao ?? old('descricao') }}
    </textarea>
</div>
</div>
<div class="row">
<label class="col-sm-3 control-label">Responsável Interno(*)</label>
<div class="col-sm-8">
    <select class="form-control" name="responsavel_interno_id" id="responsavel_interno_id">
        @if($formularioCreate === true)
            <option value=""> -- Selecione --</option>
                @foreach($users as $user)
                    <option value="{{$user->id ?? old('name') }}">{{$user->name}}</option>
                @endforeach       
        @else
                @foreach($users as $user)
                    @if ($user->id === $pauta->responsavel_interno_id)
                        <option value="{{$user->id ?? old('name') }}" selected>{{$user->name}}</option>
                    @else
                        <option value="{{$user->id ?? old('name') }}">{{$user->name}}</option>
                    @endif
                @endforeach    
        @endif
    </select> 
</div>
</div>
<div class="row">
<label class="col-sm-3 control-label">Responsável Evento</label>
<div class="col-sm-8">
    <select class="form-control" name="responsavel_evento_id" id="responsavel_evento_id">
        @if($formularioCreate === true)
            <option value=""> -- Selecione --</option>
                @foreach($responsavelEventos as $resp_evento)
                    <option value="{{$resp_evento->responsavel_evento_id ?? old('resp_evento_nome') }}">{{$resp_evento->responsavel_evento_nome}}</option>
                @endforeach
        @else
                @foreach($responsavelEventos as $resp_evento)
                    @if ($resp_evento->responsavel_evento_id === $pauta->responsavel_evento_id)
                        <option value="{{$resp_evento->responsavel_evento_id ?? old('resp_evento_nome') }}" selected>{{$resp_evento->responsavel_evento_nome}}</option>     
                    @else
                        <option value="{{$resp_evento->responsavel_evento_id ?? old('resp_evento_nome') }}">{{$resp_evento->responsavel_evento_nome}}</option>   
                    @endif
                @endforeach
        @endif
    </select> 
</div>  
</div>

<div class="row">
    <label class="col-sm-3 control-label">Observações</label>
    <div class="col-sm-8">
    <textarea  name="observacoes"
        rows="8"  id="observacoes" 
        class="form-control" placeholder="texto com as observações" value="">
        {{ $pauta->observacoes ?? old('observacoes') }}
    </textarea>
    </div> 
</div> 
<div class="row">
    <label class="col-sm-3 control-label">Resumo da análise</label>
    <div class="col-sm-8">
        <textarea  name="resumo_da_analise"
        rows="5"  id="resumo_da_analise" 
        class="form-control" placeholder="" value=""
        disabled="disabled">
        status: -observação:
        {{ $pauta->resumo_da_analise ?? old('resumo_da_analise') }}
        </textarea>
    </div> 
</div> 