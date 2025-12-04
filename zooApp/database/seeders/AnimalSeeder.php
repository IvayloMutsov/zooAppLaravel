<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalSeeder extends Seeder
{
    public function run()
    {
        DB::table('animals')->insert([
            [
                'name' => 'Бъни',
                'type_id' => 1,
                'breed_id' => 1,
                'birthdate' => '2023-03-15',
                'image' => null
            ],
            [
                'name' => 'Мишо',
                'type_id' => 2,
                'breed_id' => 3,
                'birthdate' => '2024-01-10',
                'image' => null
            ],
            [
                'name' => 'Луна',
                'type_id' => 3,
                'breed_id' => 5,
                'birthdate' => '2022-07-21',
                'image' => null
            ],
            [
                'name' => 'Рекс',
                'type_id' => 4,
                'breed_id' => 7,
                'birthdate' => '2021-11-02',
                'image' => null
            ],
        ]);
    }
}
