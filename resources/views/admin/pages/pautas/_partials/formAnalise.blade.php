<div class="row">
    <div class="form-group">
        <label>Enviar para Análise ?</label>
        <select class="form-control" name="pauta_analise" id="">
            @if($formularioCreate === true)
                        <option value=""> -- Selecione --</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    @else
                        @if($pauta->pauta_analise === "Sim")
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