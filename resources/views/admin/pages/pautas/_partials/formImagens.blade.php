<div class="row">
    <label class="col-sm-3 control-label">Título(*)</label>
    <div class="col-sm-8">
        <input type="text" name="imagem_titulo" 
        class="form-control" placeholder="Título ainda não disponível" 
        value="{{ $pauta->imagem_titulo ?? old('imagem_titulo') }}">
    </div>
</div>
<div class="row">
    <label class="col-sm-3 control-label">Descrição(*)</label>
    <div class="col-sm-8">
        <input type="text" name="imagem_descricao" 
        class="form-control" placeholder="Título ainda não disponível" 
        value="{{ $pauta->imagem_descricao ?? old('imagem_descricao') }}">
    </div>
</div>
<div class="row">
        <label class="col-sm-3 control-label">Arquivo(*)</label>
        <div class="col-sm-8">
            @if($formularioCreate === true)
                <input type="file" name="imagem_arquivo" 
                    class="form-control" placeholder="Título ainda não disponível"
                    value="{{ $pauta->imagem_arquivo ?? old('imagem_arquivo') }}">
            @else
                <img 
                    src="{{ asset('imagens/pautas/'.$pauta->imagem_arquivo) }}" 
                    alt="{{ $pauta->imagem_titulo }}" 
                    width="90px" height="90px"
                    class="img-thumbnail"
                >
            @endif
        </div>
</div>
<div class="row">
            <label class="col-sm-3 control-label">Liberar para publicação</label>
            <div class="col-sm-8">
                <select class="form-control" name="imagem_liberar_para_publicacao" id="">
                    @if($formularioCreate === true)
                        <option value=""> -- Selecione --</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    @else
                        @if($pauta->imagem_liberar_para_publicacao === "Sim")
                            <option value="Sim" selected>Sim</option>
                            <option value="Não">Não</option>
                        @else
                            <option value="Sim">Sim</option>
                            <option value="Não" selected>Não</option>
                        @endif
                    @endif
                </select> 
            </div>
</div>