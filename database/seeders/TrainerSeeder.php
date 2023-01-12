<?php

namespace Database\Seeders;

use App\Models\Pokedex;
use App\Models\Pokemon;
use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Trainer::factory()
             ->count(1000)
             ->has(Pokemon::factory()->count(fake()->numberBetween(1,6)))
             ->create();
    }
}
