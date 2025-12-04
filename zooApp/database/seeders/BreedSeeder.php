<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreedSeeder extends Seeder
{
    public function run()
    {
        DB::table('breeds')->insert([
            // Заек
            ['name' => 'Бял заек', 'type_id' => 1],
            ['name' => 'Ангорски заек', 'type_id' => 1],

            // Хамстер
            ['name' => 'Сирийски хамстер', 'type_id' => 2],
            ['name' => 'Джунгарски хамстер', 'type_id' => 2],

            // Котка
            ['name' => 'Британска късокосместа', 'type_id' => 3],
            ['name' => 'Сиамска котка', 'type_id' => 3],

            // Куче
            ['name' => 'Лабрадор Ретривър', 'type_id' => 4],
            ['name' => 'Немска овчарка', 'type_id' => 4],
        ]);
    }
}
