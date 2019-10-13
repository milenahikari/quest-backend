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
        DB::table('menus')->insert(
            [
                'name' => 'Meu perfil',
                'icon' => 'fas fa-user-edit',
                'to'   => 'profile'
            ],
            [
                'name' => 'Minhas matérias',
                'icon' => 'fas fa-chalkboard-teacher',
                'to'   => 'my-courses'
            ],
            [
                'name' => 'Medalhas',
                'icon' => 'fas fa-medal',
                'to'   => 'medals'
            ],
            [
                'name' => 'Avaliar Aula',
                'icon' => 'fas fa-star',
                'to'   => 'evaluation'
            ]
        );
    }
}
