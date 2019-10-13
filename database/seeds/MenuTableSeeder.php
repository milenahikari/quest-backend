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
        DB::table('menus')->insert([
            'name' => Str::random(10),
            'icon' => Str::random(10),
            'to'   => Str::random(10)
        ]);
    }
}
