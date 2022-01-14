<div class="row">
    <label class="col-sm-3 control-label">Classificação indicativa</label>
    <div class="col-sm-8">
        <select class="form-control" name="classificacao_indicativa_id" id="">
            @if($formularioCreate === true)
                <option value=""> -- Selecione --</option>
                    @foreach($classificacaoIndicativas as $ci)
                        <option value="{{$ci->classificacao_indicativa_id ?? old('classificacao_indicativa_titulo') }}">
                            {{ $ci->classificacao_indicativa_titulo }}
                            {{-- {{ $ci->classificacao_indicativa_descricao }} 
                            {{ $ci->classificacao_indicativa_simbolo }} --}}
                        </option>
                    @endforeach
            @else
                @if ($pauta->classificacao_indicativa_id === NULL)
                    <option value=""> -- Selecione --</option>
                        @foreach($classificacaoIndicativas as $ci)
                            <option value="{{$ci->classificacao_indicativa_id ?? old('classificacao_indicativa_titulo') }}">
                                {{ $ci->classificacao_indicativa_titulo }}
                            </option>
                        @endforeach
                @else
                    @foreach($classificacaoIndicativas as $ci)
                        @if ($ci->classificacao_indicativa_id === $pauta->classificacao_indicativa_id)
                            <option value="{{$ci->classificacao_indicativa_id ?? old('classificacao_indicativa_titulo') }}" selected>{{ $ci->classificacao_indicativa_titulo }}</option>
                        @else
                            <option value="{{$ci->classificacao_indicativa_id ?? old('classificacao_indicativa_titulo') }}">{{ $ci->classificacao_indicativa_titulo }}</option>
                        @endif
                    @endforeach
                @endif
            @endif
        </select> 
    </div>  
</div>