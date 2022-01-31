
@section('content_header')
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
@endsection


<div class="form-group">
    <label>Tipo de Pauta(*)</label>
    <select class="form-control" name="tipo_pauta" id="tipo_pauta">
        @if($formularioCreate === true)
            <option value=""> -- Selecione --</option>
            <option value="Disponibilização Externa Remunerada">    Disponibilização Externa Remunerada    </option>
            <option value="Disponibilização Externa Não Remunerada">Disponibilização Externa Não Remunerada</option>
            <option value="Disponibilização Interna Remunerada">    Disponibilização Interna Remunerada    </option>
            <option value="Disponibilização Interna Não Remunerada">Disponibilização Interna Não Remunerada</option>
            <option value="Transmissão On-line">                    Transmissão On-line                    </option>
        @else
            @if ($pauta->tipo_pauta === "Disponibilização Externa Remunerada")
                <option value="Disponibilização Externa Remunerada" selected>Disponibilização Externa Remunerada</option>
                <option value="Disponibilização Externa Não Remunerada">Disponibilização Externa Não Remunerada</option>
                <option value="Disponibilização Interna Remunerada">    Disponibilização Interna Remunerada    </option>
                <option value="Disponibilização Interna Não Remunerada">Disponibilização Interna Não Remunerada</option>
                <option value="Transmissão On-line">                    Transmissão On-line                    </option>
            @elseif($pauta->tipo_pauta === "Disponibilização Externa Não Remunerada")
                <option value="Disponibilização Externa Remunerada">Disponibilização Externa Remunerada    </option>
                <option value="Disponibilização Externa Não Remunerada" selected>Disponibilização Externa Não Remunerada</option>
                <option value="Disponibilização Interna Remunerada">    Disponibilização Interna Remunerada    </option>
                <option value="Disponibilização Interna Não Remunerada">Disponibilização Interna Não Remunerada</option>
                <option value="Transmissão On-line">                    Transmissão On-line                    </option>
            @elseif($pauta->tipo_pauta === "Disponibilização Interna Remunerada")
                <option value="Disponibilização Externa Remunerada" >    Disponibilização Externa Remunerada    </option>
                <option value="Disponibilização Externa Não Remunerada">Disponibilização Externa Não Remunerada</option>
                <option value="Disponibilização Interna Remunerada" selected>Disponibilização Interna Remunerada</option>
                <option value="Disponibilização Interna Não Remunerada">Disponibilização Interna Não Remunerada</option>
                <option value="Transmissão On-line">                    Transmissão On-line                    </option>
            @elseif($pauta->tipo_pauta === "Disponibilização Interna Não Remunerada")
                <option value="Disponibilização Externa Remunerada" >    Disponibilização Externa Remunerada    </option>
                <option value="Disponibilização Externa Não Remunerada">Disponibilização Externa Não Remunerada</option>
                <option value="Disponibilização Interna Remunerada">    Disponibilização Interna Remunerada    </option>
                <option value="Disponibilização Interna Não Remunerada" selected>Disponibilização Interna Não Remunerada</option>
                <option value="Transmissão On-line">                    Transmissão On-line                    </option>
            @elseif($pauta->tipo_pauta === "Transmissão On-line")
                <option value="Disponibilização Externa Remunerada" >    Disponibilização Externa Remunerada    </option>
                <option value="Disponibilização Externa Não Remunerada">Disponibilização Externa Não Remunerada</option>
                <option value="Disponibilização Interna Remunerada">    Disponibilização Interna Remunerada    </option>
                <option value="Disponibilização Interna Não Remunerada">Disponibilização Interna Não Remunerada</option>
                <option value="Transmissão On-line" selected>                    Transmissão On-line           </option>
                
            @endif
        @endif
    </select> 
</div>

<div class="form-group" style="display: none;" id="div-link">
    <label>Link da Live</label>
    <input type="text" name="link_transmissao_online" id="link_transmissao_online"
        class="d-none form-control" 
            placeholder="Nome:" 
            value="{{ $pauta->link_transmissao_online ?? old('link_transmissao_online') }}">
</div>
<div class="row">
        <label class="">Categoria(*)</label>
        <div class="form-group"> 
            <select class="form-control dynamic" 
            data-dependent="subcategoria_id"
            name="categoria_id" 
            id="categoria_id">
                @if($formularioCreate === true)
                    <option value="">-- Selecione --</option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->categoria_id ?? old('categoria_id') }}">{{$categoria->categoria_nome}}</option>
                        @endforeach
                @else
                        @foreach($categorias as $categoria)
                            @if($categoria->categoria_id === $pauta->categoria_id)
                                <option value="{{$categoria->categoria_id ?? old('categoria_id') }}" selected>{{$categoria->categoria_nome}}</option>
                            @else
                                <option value="{{$categoria->categoria_id ?? old('categoria_id') }}">{{$categoria->categoria_nome}}</option>
                            @endif
                        @endforeach
                @endif
            </select>
        </div>
    
        <label>SubCategoria</label>
        <div class="form-group">
            <select class="form-control dynamic" 
                name="subcategoria_id" 
                id="subcategoria_id" 
                required>
                @if($formularioCreate === true)
                    <option value="">-- Selecione --</option>
                        {{-- @foreach($subCategorias as $subCategoria)
                            <option value="{{$subCategoria->subcategoria_id ?? old('subcategoria_id') }}">{{$subCategoria->subcategoria_nome}}</option>
                        @endforeach     --}}
                @else
                        {{-- @foreach($subCategorias as $subCategoria)
                            @if($subCategoria->subcategoria_id === $pauta->subcategoria_id)
                                <option value="{{$subCategoria->subcategoria_id ?? old('subcategoria_id') }}" selected>{{$subCategoria->subcategoria_nome}}</option>
                            @else
                                <option value="{{$subCategoria->subcategoria_id ?? old('subcategoria_id') }}">{{$subCategoria->subcategoria_nome}}</option>
                            @endif
                        @endforeach  --}}
                @endif
            </select>
        </div>
        {{-- <label>SubCategoria</label>
        <span class="carregando">Aguarde, carregando ...</span>
        <div class="form-group">
            <select class="form-control dynamic" 
                name="subcategoria_id" 
                id="subcategoria_id" required>
                @if($formularioCreate === true)
                    <option value="">-- Selecione --</option>
                        @foreach($subCategorias as $subCategoria)
                            <option value="{{$subCategoria->subcategoria_id ?? old('subcategoria_id') }}">{{$subCategoria->subcategoria_nome}}</option>
                        @endforeach    
                @else
                        @foreach($subCategorias as $subCategoria)
                            @if($subCategoria->subcategoria_id === $pauta->subcategoria_id)
                                <option value="{{$subCategoria->subcategoria_id ?? old('subcategoria_id') }}" selected>{{$subCategoria->subcategoria_nome}}</option>
                            @else
                                <option value="{{$subCategoria->subcategoria_id ?? old('subcategoria_id') }}">{{$subCategoria->subcategoria_nome}}</option>
                            @endif
                        @endforeach 
                @endif
            </select>
        </div> --}}
</div>

<div class="row">
        <label>Venda de ingresso?(*)</label>
        <div class="form-group">
            <select class="form-control" name="possui_venda_ingresso" 
                id="possui_venda_ingresso">
                @if($formularioCreate === true)
                    <option value=""> -- Selecione --</option>
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                @else
                     @if($pauta->possui_venda_ingresso === "Sim")
                        <option value="Sim" selected>Sim</option>
                        <option value="Não">Não</option>
                     @else
                        <option value="Sim">Sim</option>
                        <option value="Não" selected>Não</option>
                     @endif
                @endif
            </select> 
        </div>
        <div class="form-group" style="display: none;" id="div-ingresso">
            <label>Url pagamento</label>
            <input type="text" name="link_venda_ingresso" class="form-control" placeholder="Nome:" 
            value="{{ $pauta->link_venda_ingresso ?? old('link_venda_ingresso') }}">
        </div>
</div>

@section('javascript')
   <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
@endsection

<script>
    $(document).ready(function(){
        $('.dynamic').change(function(){
            if($(this).val() != ''){
                var select = $(this).attr("id");
                var value = $(this).val(); 
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url : "{{ route('dynamicdependent.fetch') }}",
                    method: "POST",
                    data:{
                        select:select,
                        value:value,
                        _token:_token,
                        dependent:dependent
                    },
                    success:function(result){
                        $('#'+dependent).html(result);
                    }
                })  
            }
        })
    })
</script>

<script>
    $(document).ready(() => {
                $('#tipo_pauta').change(() => {
                    const selectSelecionado = $('#tipo_pauta').children('option:selected').val()
                    if(selectSelecionado === 'Transmissão On-line'){
                        $('#div-link').css("display", "block")
                        $('#link_transmissao_online').removeClass('d-none')
                        
                    }else{
                        $('#div-link').css("display", "none")
                        $('#link_transmissao_online').addClass('d-none')
                      
                    }
                }) 
                
                $('#possui_venda_ingresso').change(() => {
                    const selectSelecionado = $('#possui_venda_ingresso').children('option:selected').val()
                    if(selectSelecionado === 'Sim'){
                        $('#div-ingresso').css("display", "block")
                       // $('#link_transmissao_online').removeClass('d-none')
                    }else{
                        $('#div-ingresso').css("display", "none")
                       // $('#link_transmissao_online').addClass('d-none')
                    }
                }) 
    })			
</script>
