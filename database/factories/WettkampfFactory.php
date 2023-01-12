<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wettkampf>
 */
class WettkampfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'trainerid_sieger' => fake()->numberBetween(1, $countedTrainers = DB::table('trainer')->count()),
            'trainerid_verlierer' => fake()->numberBetween(1, $countedTrainers),
            'region' => fake()->randomElement(['Kanto', 'Johto', 'Hoenn', 'Sinnoh', 'Einall', 'Kalos', 'Alola', 'Galar', 'Hisui']),
            'preisgeld' =>fake()->numberBetween(50, 1500)

        ];
    }
}
