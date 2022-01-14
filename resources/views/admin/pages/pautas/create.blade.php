@extends('adminlte::page')

@section('title', 'Sigec - Cadastrar pauta')

@section('content_header')
    @include('admin.includes.carrousselImports')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <h1>NOVA PAUTA</h1>
    <style type="text/css">
        .carregando {
            color: #ff0000;
            display: none;
        }
    </style>
   
    <script type="text/javascript">
        $('#categoria_id').on('change',function(e){
         console.log(e);
         var cat_id = e.target.value;
         $('.carregando').show();
          //ajax
            $.get('/ajax-subcat?cat_id='+cat_id, function(data){
                //subcategory
                $('#subcategoria_id').empty();
                        $('#subcategoria_id').append($("<option></option>").val("").html("--Select Sub Category--"));
                $.each(data,function(index, subcatObj){
                        $('#subcategoria_id').append('<option value="'+subcatObj.subcategoria_id+'">'+subcatObj.subcategoria_nome+'</option>');
                })
            })
        });
    </script>
@stop
@section('content')
    <div class="card">
        {{-- @include('admin.includes.menuNavPautas') --}}
        <div class="card-body">
            <form action="/pautas" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                
                @include('admin.pages.pautas._partials.form')
            </form>
        </div>
    </div>

<!--
 <script type="text/javascript">
   $(function() {
        $('#categoria_id').change(function() {
            if( $(this).val() ) {
                $('#subcategoria_id').hide();
                $('.carregando').show();
                $.getJSON('sub_categorias.php?search=',{categoria_id: $(this).val(), ajax: 'true'}, function(j)){
                    var options = '<option value="">Escolha Subcategoria</option>';
                    for(var i = 0; i < j.length; i++){
                        options += '<option value="'+ j[i].id + '">' + j[i].subcategoria_nome + '</option>';
                    }
                    $('#subcategoria_id').html(options).show();
                    $('.carregando').hide();
                });
            }else{
                $('#subcategoria_id').html('<option value="">- Escolha Subcategoria -</option>');
            }
        });
   });
</script> 
-->
<script type="text/javascript">
    google.load("search", "1");
    google.load("jquery", "1.4.2");
    google.load("jqueryui", "1.7.2");
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
</script>

@endsection