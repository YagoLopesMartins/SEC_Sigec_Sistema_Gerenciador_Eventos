@extends('adminlte::page')

@section('title', 'Programação de eventos')

@section('content_header')
    {{-- <link rel="stylesheet" href=" {{ asset('css/lista-eventos.css') }}"> --}}
    <h1>Programação de eventos</h1>
    @include('site.includes.importsFullCallendarAjax')
	
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div id='calendar'></div>
            </div>
            <div class="col-6">
                @foreach($pautas as $pauta)
                    <div class="card" style="width: 18rem;">
                        @if($pauta->imagem_arquivo != NULL)
                            <img 
                                src="{{ asset('imagens/pautas/'.$pauta->imagem_arquivo)}}" 
                                alt="{{ $pauta->imagem_titulo }}" 
                                width="200px" height="200px"
                                class="card-img-top" 
                            >
                        @else
                            <img 
                                src="{{ asset('imagens/pautas/foto_indisponivel.jpg') }}" 
                                alt="{{ $pauta->imagem_titulo }}" 
                                width="200px" height="200px"
                                class="card-img-top" 
                            >
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $pauta->imagem_titulo }}</h5>
                            <p class="card-text">{{ $pauta->imagem_descricao }}</p>
                            <a href="#" class="btn btn-primary">Inscreva-se</a>
                        </div>
                    </div>
                @endforeach
            </div>     
        </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function () {
			
			var SITEURL = "{{ url('/') }}";
			
			$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
	  
				var calendar = $('#calendar').fullCalendar({
						editable: true,
						events: SITEURL + "/programacaoEventos",
						displayEventTime: false,
						editable: true,
						eventRender: function (event, element, view) {
							if (event.allDay === 'true') {
									event.allDay = true;
							} else {
									event.allDay = false;
							}
						},
						selectable: true,
						selectHelper: true,
						select: function (start, end, allDay) {
							var title = prompt('Event Title:');
							if (title) {
								var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
								var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
								$.ajax({
									url: SITEURL + "/fullcalenderAjax",
									data: {
										title: title,
										start: start,
										end: end,
										type: 'add'
									},
									type: "POST",
									success: function (data) {
										displayMessage("Event Created Successfully");
	  
										calendar.fullCalendar('renderEvent',
											{
												id: data.id,
												title: title,
												start: start,
												end: end,
												allDay: allDay
											},true);
	  
										calendar.fullCalendar('unselect');
									}
								});
							}
						},
						eventDrop: function (event, delta) {
							var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
							var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
	  
							$.ajax({
								url: SITEURL + '/fullcalenderAjax',
								data: {
									title: event.title,
									start: start,
									end: end,
									id: event.id,
									type: 'update'
								},
								type: "POST",
								success: function (response) {
									displayMessage("Event Updated Successfully");
								}
							});
						},
						eventClick: function (event) {
							var deleteMsg = confirm("Do you really want to delete?");
							if (deleteMsg) {
								$.ajax({
									type: "POST",
									url: SITEURL + '/fullcalenderAjax',
									data: {
											id: event.id,
											type: 'delete'
									},
									success: function (response) {
										calendar.fullCalendar('removeEvents', event.id);
										displayMessage("Event Deleted Successfully");
									}
								});
							}
						}
				});
		});
	 
		function displayMessage(message) {
			toastr.success(message, 'Event');
		} 
	  
	</script>
@stop
