<div class="row">
        <label class="col-sm-3 control-label">Arquivos(*)</label>
        <div class="col-sm-8">
            @if($formularioCreate === true)
                <input type="file" name="anexos_arquivo[]" multiple="multiple"
                    class="dropzone clickable" placeholder="Título ainda não disponível"
                    value="{{ $pauta->anexos_arquivo ?? old('anexos_arquivo') }}">
            @else
                @if($pauta->anexos_arquivo != NULL)
                    <ul>
                        <li>{{ asset('anexos/arquivos/'.$pauta->anexos_arquivo) }}</li>
                    </ul>       
                @else
                    <label for="">Não possui arquivos anexados</label>
                    <input type="file" name="anexos_arquivo[]" multiple="multiple"
                        class="dropzone clickable" placeholder="Título ainda não disponível"
                        value="{{ $pauta->anexos_arquivo ?? old('anexos_arquivo') }}">
                @endif
            @endif
        </div>
</div>