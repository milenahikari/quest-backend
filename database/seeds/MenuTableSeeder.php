<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('explanations')->insert([
            [
                'title'    => 'APRENDA',
                'image'    => 'grupoestudo.png',
                'position' => '0px -15px',
                'textI'    => 'Encontre a ajuda perfeita para entender a matéria',
                'textII'   => 'Tire suas dúvidas com um amigo',
                'textIII'  => 'Combine o melhor momento para estudar',
                'textIV'   => '',
            ],
            [
                'title'    => 'ENSINE',
                'image'    => 'ensinar.png',
                'position' => '0px -55px',
                'textI'    => 'Compartilhe seu conhecimento',
                'textII'   => 'Faça novas amizades',
                'textIII'  => 'Divirta-se ensinando e aprendendo',
                'textIV'   => '',
            ],
            [
                'title'    => 'CONQUISTE',
                'image'    => 'premio.jpg',
                'position' => '0px -20px',
                'textI'    => 'Colabore ensinando e ganhe estrelas',
                'textII'   => 'Cumpra metas e colecione pedras preciosas',
                'textIII'  => 'Seja um membro',
                'textIV'   => 'É grátis :)',
            ],
        ]);
    }
}
