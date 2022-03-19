<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Aplicante::factory(10)->create();
        \App\Models\Prova::factory(10)->create();
        \App\Models\Pergunta::factory(50)->create();
    }
}
