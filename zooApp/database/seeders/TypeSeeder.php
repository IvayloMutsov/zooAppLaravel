<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('types')->insert([
            ['name' => 'Заек'],
            ['name' => 'Хамстер'],
            ['name' => 'Котка'],
            ['name' => 'Куче'],
        ]);
    }
}
