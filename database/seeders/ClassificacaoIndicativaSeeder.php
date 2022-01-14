<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassificacaoIndicativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classificacao_indicativa')->insert([
            'classificacao_indicativa_titulo' => 'Livre',
            'classificacao_indicativa_descricao' => '<p>
                        São admitidos com essa classificação obras que contenham predominantemente conteúdos sem inadequações, como os elencados abaixo:
                        <ul>
                        <li><strong>Violência:</strong> Violência fantasiosa; presença de armas sem violência; mortes sem violência; ossadas e esqueletos sem violência.</li>
                        <li><strong>Sexo e Nudez:</strong> Nudez não erótica; ou mesmo sem a presença de nudez; sem a presença de conteúdo sexual.</li>
                        <li><strong>Drogas:</strong> Consumo moderado ou insinuado de drogas lícitas sem relevância para a obra.</li>
                        </ul>
                        </p>',
            'classificacao_indicativa_simbolo' => 'livre.png',
        ]);
        DB::table('classificacao_indicativa')->insert([
            'classificacao_indicativa_titulo' => 'Não recomendado para menores de dez anos',
            'classificacao_indicativa_descricao' => '<p>
            São admitidos com essa classificação obras que contenham predominantemente conteúdos com inadequações leves, como os elencados abaixo:
            <ul>
            <li><strong>Violência:</strong> Presença de armas com intuito de violência; medo/tensão; angústia; ossadas e esqueletos com resquícios de ato de violência; atos criminosos sem violência; linguagem depreciativa.</li>
            <li><strong>Sexo e Nudez:</strong> Conteúdos educativos sobre sexo.</li>
            <li><strong>Drogas:</strong> Descrições verbais do consumo de drogas lícitas; discussão sobre o tema “tráfico de drogas”; uso medicinal de drogas ilícitas.</li>
            </ul>
            </p>',
            'classificacao_indicativa_simbolo' => 'menores_10.png',
        ]);
        DB::table('classificacao_indicativa')->insert([
            'classificacao_indicativa_titulo' => 'Não recomendado para menores de doze anos',
            'classificacao_indicativa_descricao' => '<p>
            São admitidos com essa classificação obras que contenham predominantemente conteúdos com inadequações relativamentes leves, como os elencados abaixo:
            <ul>
            <li><strong>Violência:</strong> Ato violento; lesão corporal; descrição de violência; presença de sangue; sofrimento da vítima; morte natural ou acidental com violência; ato violento contra animais; exposição ao perigo; exposição de pessoas em situações constrangedoras ou degradantes; agressão verbal; obscenidade; bullying; exposição de cadáver; assédio sexual; supervalorização da beleza física; supervalorização do consumo.</li>
            <li><strong>Sexo e Nudez:</strong> Nudez velada; insinuação sexual; carícias sexuais; masturbação não explícita; palavrões; linguagem de conteúdo sexual; simulações de sexo; apelo sexual.</li>
            <li><strong>Drogas:</strong> Consumo de drogas lícitas; indução ao uso de drogas lícitas; consumo irregular de medicamentos; menção a drogas ilícitas.</li>
            </ul>
            </p>',
            'classificacao_indicativa_simbolo' => 'menores_12.png',
        ]);
        DB::table('classificacao_indicativa')->insert([
            'classificacao_indicativa_titulo' => 'Não recomendado para menores de catorze anos',
            'classificacao_indicativa_descricao' => '<p>
            São admitidos com essa classificação obras que contenham predominantemente conteúdos com inadequações relativamentes leves, como os elencados abaixo:
            <ul>
            <li><strong>Violência:</strong> Morte intencional; preconceito.</li>
            <li><strong>Sexo e Nudez:</strong> Nudez; erotização; vulgaridade; relação sexual; prostituição.</li>
            <li><strong>Drogas:</strong> Insinuação do consumo de drogas ilícitas; descrições verbais do consumo e tráfico de drogas ilícitas; discussão sobre “descriminalização de drogas ilícitas”.</li>
            </ul>
            </p>',
            'classificacao_indicativa_simbolo' => 'menores_14.png',
        ]);
        DB::table('classificacao_indicativa')->insert([
            'classificacao_indicativa_titulo' => 'Não recomendado para menores de dezesseis ano',
            'classificacao_indicativa_descricao' => '<p>
            São admitidos com essa classificação obras que contenham predominantemente conteúdos com inadequações intensas, como os elencados abaixo:
            <ul>
            <li><strong>Violência:</strong> Estupro; exploração sexual; coação sexual; suicídio; tortura; mutilação; violência gratuita/banalização da violência; aborto; pena de morte; eutanásia.</li>
            <li><strong>Sexo e Nudez:</strong> Relação sexual intensa/de longa duração.</li>
            <li><strong>Drogas:</strong> Produção ou tráfico de qualquer droga ilícita; consumo de drogas ilícitas; indução ao consumo de drogas ilícitas.</li>
            </ul>
            </p>',
            'classificacao_indicativa_simbolo' => 'menores_16.png',
        ]);
        DB::table('classificacao_indicativa')->insert([
            'classificacao_indicativa_titulo' => 'Não recomendado para menores de dezoito anos',
            'classificacao_indicativa_descricao' => '<p>
            São admitidos com essa classificação obras que contenham predominantemente conteúdos com inadequações extremas, como os elencados abaixo:
            <ul>
            <li><strong>Violência:</strong> Violência de forte impacto; elogio ou apologia da violência; crueldade; crimes de ódio; pedofilia.</li>
            <li><strong>Sexo e Nudez:</strong> Sexo explícito; situações sexuais complexas/de forte impacto (incesto, sexo grupal, fetiches violentos e Pornografia).</li>
            <li><strong>Drogas:</strong> Elogio/glamourização ou apologia ao uso de drogas ilícitas.</li>
            </ul>
            </p>',
            'classificacao_indicativa_simbolo' => 'menores_18.png',
        ]);
    }
}
