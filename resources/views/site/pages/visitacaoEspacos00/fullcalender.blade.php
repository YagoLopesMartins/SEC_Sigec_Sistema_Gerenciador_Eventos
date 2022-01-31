<!DOCTYPE html>
<html>
<head>
    <title>Laravel Fullcalender </title>
    @include('site.includes.importsFullCallendarAjax')
</head>
<body>
  
<div class="container-xxl">
    <div class="row">
        <div class="col-6">
            <div id='calendar'></div>
        </div>
        <div class="col-6">
            @include('site.includes.tabelaHorariosVisitacaoEspaco')
        </div>
    </div>
</div>

   
<script>
    $(document).ready(function () {
        
        var SITEURL = "{{ url('/') }}";
        
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  
            var calendar = $('#calendar').fullCalendar({
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                buttonText: {
                    month: "Mês",
                    week: "Semana",
                    day: "Dia",
                    list: "Compromissos",
                    today: "Hoje"
                },
                    editable: true,
                    events: SITEURL + "/fullcalender",
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
                        var title = prompt('Titulo do evento:');
                        // var horaInicio = prompt('Hora inicio:');
                        // var horaFim = prompt('Hora fim:');
                        // var vagas = prompt('Vagas:');
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
                                    displayMessage("Evento criado com sucesso");
  
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
                                displayMessage("Evento atualizado com sucesso");
                            }
                        });
                    },
                    eventClick: function (event) {
                        var deleteMsg = confirm("Você deseja realmente excluir o evento?");
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
                                    displayMessage("Evento excluido com sucesso");
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
  
</body>
</html>