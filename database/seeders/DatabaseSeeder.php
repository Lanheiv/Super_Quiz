<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            \Database\Seeders\Topics\SportsSeeder::class,
            \Database\Seeders\Topics\MoviesSeeder::class,
            \Database\Seeders\Topics\ProgrammingSeeder::class,
            \Database\Seeders\Topics\HealthSeeder::class,
            \Database\Seeders\Topics\FoodSeeder::class,
        ]);
    }
}
