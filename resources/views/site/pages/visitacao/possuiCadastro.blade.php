<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprovante de Inscrição</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
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
        <div id="div-principal" align=center>
            <h1 class="ui header" style="color: rgb(36, 224, 51); font-size: 16px;">Inscrição já foi agendada!</h1>
            <p id="descricao-page-comprovante-text" style="color: rgb(60, 145, 202);"></p>
            <h1 class="ui header" id="texto-comprovacao"></h1>
            <h1 class="ui header" id="texto-comprovacao">
                Inscrição já foi agendada!
            </h1>
        </div>
    </div>
</body>
</html>
