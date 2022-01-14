<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspacoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('espacos')->insert([
            'espaco_nome' => 'PRAÇA HELIODORO BALBI (PRAÇA DA POLÍCIA)',
            'espaco_hora_funcionamento_inicio' => '08:00',
            'espaco_hora_funcionamento_fim' => '21:00',
            'espaco_endereco' => 'Avenida Sete de Setembro, s/n – Centro – Manaus/AM, 69010-220',
            'espaco_informacoes' => 
            'Considerada ponto tradicional da cidade, aberta ainda na época do Império, a Praça Heliodoro Balbi, ou 
            Praça da Polícia, ocupa uma área de 8.515 m², no centro da cidade de Manaus. 
            O codinome deve-se ao fato de ter sido palco, por muitos anos, para as apresentações da banda da Polícia Militar. E, também, 
            pelo fato de até 2004 ter abrigado o Comando Geral da PM, no prédio onde existia, anteriormente, o Palacete Provincial. 
            Esse prédio foi restaurado em 2008, para dar lugar a mais um espaço cultural da cidade, recebendo novamente o nome de Palacete 
            Provincial. A Praça Heliodoro Balbi conta com duas piscinas ornamentais, árvores, quiosques e sebos, além do tradicional 
            Café do Pina, bancas de tacacá, sorvete, entre outros. No espaço são também realizados shows musicais, concertos, 
            atividades circenses, espetáculos natalinos, dentre outros eventos.
            ESPECTADORES DE EVENTOS NO LOCAL: Cerca de 8 mil ao ano.
            Funcionamento Acesso livre Acessibilidade para deficiente físico.',
            'espaco_latidude' => '-3.134889',
            'espaco_longitude' => '-60.021522',
            'espaco_telefone' => '(92)3131-2450',
            'espaco_email' => 'dppc@cultura.am.gov.br',
            'espaco_estado' => 'Ativo',
            'espaco_disponivel_visitacao' => 'Sim',
            'espaco_horario_segunda' => 'de 08h:00 às 12h:00',
            'espaco_horario_terca' => 'de 08h:00 às 12h:00',
            'espaco_horario_quarta' => 'de 08h:00 às 12h:00',
            'espaco_horario_quinta' => 'de 08h:00 às 12h:00',
            'espaco_horario_sexta' => 'de 08h:00 às 12h:00',
            'espaco_horario_sabado' => 'de 08h:00 às 12h:00',
            'espaco_horario_domingo' => 'de 08h:00 às 12h:00',
         
            'espaco_grupo_id' => 1,
            'espaco_responsavel_id' => 1
        ]);
    }
}
