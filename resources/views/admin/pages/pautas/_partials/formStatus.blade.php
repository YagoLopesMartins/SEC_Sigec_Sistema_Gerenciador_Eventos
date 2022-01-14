<div class="form-group">
    <label>Status</label>
    <select class="form-control" name="pauta_status" id="pauta_status">
        @if($formularioCreate === true)
            <option value=""> -- Selecione --</option>
            <option value="Aberto">     Aberto      </option>
            <option value="Em análise"> Em análise  </option>
            <option value="Correção">   Correção    </option>
            <option value="Aprovado">   Aprovado    </option>
            <option value="Cancelado">  Cancelado   </option>
        @else
            @if ($pauta->pauta_status === "Aberto")
                <option value="Aberto" selected>     Aberto      </option>
                <option value="Em análise"> Em análise  </option>
                <option value="Correção">   Correção    </option>
                <option value="Aprovado">   Aprovado    </option>
                <option value="Cancelado">  Cancelado   </option>
            @elseif($pauta->pauta_status === "Em análise")
                <option value="Aberto">     Aberto      </option>
                <option value="Em análise" selected> Em análise  </option>
                <option value="Correção">   Correção    </option>
                <option value="Aprovado">   Aprovado    </option>
                <option value="Cancelado">  Cancelado   </option>
            @elseif($pauta->pauta_status === "Correção")
                <option value="Aberto">     Aberto      </option>
                <option value="Em análise"> Em análise  </option>
                <option value="Correção" selected>   Correção    </option>
                <option value="Aprovado">   Aprovado    </option>
                <option value="Cancelado">  Cancelado   </option>
            @elseif($pauta->pauta_status === "Aprovado")
                <option value="Aberto">     Aberto      </option>
                <option value="Em análise"> Em análise  </option>
                <option value="Correção">   Correção    </option>
                <option value="Aprovado" selected>   Aprovado    </option>
                <option value="Cancelado">  Cancelado   </option>
            @elseif($pauta->pauta_status === "Cancelado")
                <option value="Aberto">     Aberto      </option>
                <option value="Em análise"> Em análise  </option>
                <option value="Correção">   Correção    </option>
                <option value="Aprovado">   Aprovado    </option>
                <option value="Cancelado" selected>  Cancelado   </option>
            @endif
        @endif
    </select> 
</div>