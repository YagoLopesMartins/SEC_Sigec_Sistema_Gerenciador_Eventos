<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Fabrica Papai Noel 2021</title> 
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            td{
                text-align: center;
            }
            h2,h3 {
                text-align: center;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h3>Inscritos para a Fabrica do Papai Noel </h3>
        <h3>Dia:  <b>{{$horario->horario_visitacao_data}}</b> - 
            Hora: <b>{{$horario->horario_visitacao_hora_inicio}}</b></h3> 
            
            <table class="">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>INSCRITO</th>
                        <th>DEPENDENTE</th>
                        <th>DEPENDENTE</th>
                        <th>VISITOU ?</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($visitantes_inscritos_horario as $inscritos)
                        <tr>
                            <td>-</td>
                            <td>{{ $inscritos->nome_completo }}</td>
                            <td><b>{{ $inscritos->dependente_nome ?? '-' }}</b></td>
                            <td>{{ $inscritos->dependente2_nome ?? '-' }}</td>
                            <td><b>{{ $inscritos->visitou ?? ' '}}</b></td>
                        </tr>
                    @empty
                        <li>Nenhum Inscrito Cadastrado.</li>
                    @endforelse
                </tbody>
            </table>
        
    </body>
</html>