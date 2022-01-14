<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <title>QrCode</title>
    <style>
        body {
            background-image: url(snow-fundo.png);
            background-repeat: no-repeat;
        }

        #div-principal {
            padding-right: 70px;
            padding-top: 40px;
            padding-left: 70px;
            padding-bottom: 20px;
            margin: 0;
        }

        #div-infos {
            padding-right: 60px;
            padding-left: 60px;
            color: rgb(45, 71, 63);
        }

        #descricao-page-comprovante-text {
            font-size: 15px;
            color: rgb(53, 95, 81);
        }

        #texto-comprovacao {
            color: rgb(73, 110, 98);
            font-size: 21px;
            margin-top: -10px;
        }

        .divider {
            position: relative;
            height: 1px;
        }

        .div-transparent:before {
            position: absolute;
            top: 0;
            width: 100%;
            height: 1px;
            background-color: rgb(106, 202, 138);
        }

        #place-qr {
            border: 1px;
            border-color: chocolate;
            border-style: solid;
            margin-top: 24px;
            width: 130px;
            height: 130px;
            float: right;
        }

        #wrap-all {
            max-width: 800px;
            margin: auto;
            background-color: white;
        }

        #label-espaco-comprovante {
            font-size: 15px;
        }

        #label-data-comprovante {
            font-size: 15px;
        }

        #label-horario-comprovante {
            font-size: 15px;
        }

        #infos-espaco-visitacao {
            padding-top: 15px;
            color: rgb(45, 71, 63);
        }

        #texto-title {
            color: rgb(73, 110, 98);
            font-size: 21px;
        }

        #infos-visitante {
            padding-right: 60px;
            padding-top: 30px;
            padding-left: 60px;
        }

        #label-documento-comprovante {
            font-size: 15px;
            color: rgb(70, 97, 89);
            line-height: 22px;
        }

        #label-nome-comprovante {
            font-size: 15px;
        }

        #label-contato-comprovante {
            font-size: 15px;
        }

        #label-deficiencia-comprovante {
            font-size: 15px;
        }

        #infos-visitante-visitacao {
            color: rgb(45, 71, 63);
            padding-top: 15px;
        }

        #observacoes-importantes {
            padding-right: 60px;
            padding-left: 60px;
            padding-top: 30px;
        }

        #div-importantes-observacoes {
            padding-top: 18px;
            color: rgb(45, 71, 63);
        }

        #label-nome-dependente-comprovante {
            font-size: 15px;

        }

        #label-data-dependente-comprovante {
            font-size: 15px;
        }

        #infos-visitante-dependente-visitacao {
            color: rgb(45, 71, 63);
            padding-top: 15px;
        }

    </style>
</head>
<body>

    <div id="wrap-all">
        <center style="padding-top: 16px">
            <button type="button" onclick="imprimir()">Imprimir comprovante</button>
        </center>
        

        <div id="div-principal" align=center>
            <img src="https://eventos.cultura.am.gov.br/logo-christmas.png" width="130px" style="margin-top: -30px;">
            <img src="https://eventos.cultura.am.gov.br/logo-1.png" width="75px" style="margin-top: -30px;">
            <div style="margin: auto; text-align: center;">
                <img src="https://eventos.cultura.am.gov.br/subtitle.png" width="330px" style="text-align: center;">
            </div>

            <h1 class="ui header" style="color: rgb(60, 145, 202); font-size: 16px;">COMPROVANTE DE INSCRIÇÃO</h1>

            <p id="descricao-page-comprovante-text" style="color: rgb(60, 145, 202);"></p>
            <h1 class="ui header" id="texto-comprovacao"></h1>
        </div>
    
        <img src="https://chart.googleapis.com/chart?cht=qr&chs=500x500&chl='{{$code}}'">
        <div style="max-width: 500px;">
            <p id="descricao-page-comprovante-text"
                style="padding-top: 15px; padding-bottom: 15px; font-size: 20px important!;">Salve este
                comprovante, você vai precisar apresentar (impresso ou na tela do celular) na entrada do evento
                junto com o documento de
                identificação cadastrado.</p>
        </div>

        <div id="div-infos">
            <div class="divider div-transparent"></div>
        </div>

        <div id="infos-visitante">
            <h1 class="ui header" id="texto-title">Informações do Inscrito</h1>
            <div class="divider div-transparent"></div>

            <div id="infos-visitante-visitacao">
                <p id="label-nome-comprovante"><b>Nome: {{ $visitante_cadastrato->nome_completo }}</b> </p>
                <p id="label-documento-comprovante"><b>Contato: {{ $visitante_cadastrato->contato ?? ''}}</b> </p>
                <p id="label-documento-comprovante"><b>Deficiência: {{ $visitante_cadastrato->deficiencia ?? ''}}</b> </p>
            </div>
        </div>
        </div>
    </div>
    <div id="observacoes-importantes">
        <h1 class="ui header" id="texto-title">No dia do evento, lembre-se que:</h1>
        <div class="divider div-transparent"></div>
        <div id="div-importantes-observacoes">
            <b>
                <p id="label-documento-comprovante"> ● É necessário apresentar este comprovante e documento de
                    identificação com foto;</p>
                <p id="label-documento-comprovante"> ● O comprovante de agendamento é pessoal, intransferível e só é
                    válido para o dia e horário presentes no mesmo, não sendo permitido a utilização dele em dias e
                    horários diferentes;</p>
                <p id="label-documento-comprovante"> ● De acordo com o Decreto do Governo do Estado do Amazonas Nº
                    44.581 de 22 DE SETEMBRO DE 2021, é obrigatória a apresentação do cartão de vacinação da
                    COVID-19, com o ciclo de vacinação completo - dose única ou as duas doses, tanto para visitantes
                    brasileiros quanto para estrangeiros, exceto menores de idade que ainda não estejam contemplados
                    na faixa etária de vacinação;</p>
                <p id="label-documento-comprovante"> ● Será proibida a entrada de visitantes com sintomas de gripe e
                    febre;</p>
                <p id="label-documento-comprovante"> ● Outras informações poderão ser acrescentadas ao evento
                    principal.</p>
        </div>
    </div>
    </div>
    
    <footer style="margin: auto; text-align: center;">
        <img src="https://eventos.cultura.am.gov.br/Cartela-natal-100.jpg"
            style="width: 100%; padding: 30px; max-width: 900px;">
    </footer>
    <script>
        function imprimir(){
            window.print();
        }
    </script>
</body>
</html>
