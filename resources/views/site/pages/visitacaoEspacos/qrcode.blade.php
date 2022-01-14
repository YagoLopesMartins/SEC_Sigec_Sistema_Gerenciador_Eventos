<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QrCode</title>
</head>
<body>

    <h4>Parabéns, sua visita foi agendada</h4>
    <h3>COMPROVANTE DE AGENDAMENTO</h3>
    <h6>Atente-se as observações e leve este comprovante no dia da visita</h6>
    <h3>Informações da Visita</h3>
    {{-- <div style="text-align: center;" class="visible-print text-center"> --}}
        {{-- {!! QrCode::size(300)->generate(Request::url()); !!} --}}
        {!! QrCode::size(300)->generate($uri); !!}
        <p>Espaço: {{ $uri }}</p>
        <p>Data: 26/02/1994</p>
        <p>Horário: 09:00</p>
        
     
        <p>Data: {{ $horario_visitacao_espacos_lista }}</p>
             
    {{-- </div> --}}

    <h3>Informações do Visitante</h3>
    <p>Documento: 015.015.015-00</p>
    <p>Nome: Seu nome e sobrenome</p>
    <p>Contato: (92) 992624522</p>
    <p>Deficiência: Não</p>

    <h3>Observações Importantes</h3>
    <p>Uso obrigatório de máscara</p>
    <p>Apresentação do cartão de vacina</p>

    {{-- <div style="text-align: center;" class="visible-print text-center">
        {!! QrCode::color(255,0,255); !!}
        {{-- {!! QrCode::backgroundColor(255,255,0); !!} 
        {!! QrCode::size(300)->generate($uri); !!}
        <p>{{ $uri }}</p>
    </div> --}}

    {{-- <div style="text-align: center;" class="visible-print text-center">
        {!! QrCode::format('png')->merge('http://www.google.com/search?q=teatro+amazonas&tbm=isch&ved=2ahUKEwiIjr3MirT0AhXPOLkGHTobDvcQ2-cCegQIABAA&oq=teatro+amazonas&gs_lcp=CgNpbWcQAzIFCAAQgAQyBQgAEIAEMgUIABCABDIFCAAQgAQyBQgAEIAEMgUIABCABDIFCAAQgAQyBAgAEB4yBAgAEB4yBAgAEB46BAgAEENQniJYjDZgkThoAHAAeACAAbIBiAGJFJIBBDAuMTaYAQCgAQGqAQtnd3Mtd2l6LWltZ8ABAQ&sclient=img&ei=xc2fYciXEM_x5OUPura4uA8&bih=657&biw=1024#imgrc=YtNg-Y7H9iR7yM', .3, true)->generate();  !!}
        <p>{{ $uri }}</p>
    </div> --}}

    <button type="button" onclick="imprimir()">Salvar comprovante</button>

    <script>
        function imprimir(){
            window.print();
        }
    </script>

</body>
</html>