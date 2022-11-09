<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'trainer_sieger' => fake()->numberBetween(1, 1000),
            'trainer_verlierer' => fake()->numberBetween(1, 1000),
            'region' =>fake()->city(),
            'preisgeld' =>fake()->numberBetween(50, 1500)

        ];
    }
}
