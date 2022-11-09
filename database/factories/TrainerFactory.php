<?php

namespace Database\Factories;

use App\Models\Pokemon;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;



class TrainerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'geburtsdatum' => fake()->dateTimeBetween('-60 years', '-14 years')->format('Y-m-d'),
            'region' => fake()->city(),
            'geld' => fake()->randomNumber(6, false),
            'istArenaleiter' => $this->setArenaleiterbyChance(fake()->randomNumber(3, false)), //change of being Arenaleiter is 1%
        ];
    }
    private function setArenaleiterbyChance(int $int) : int
    {
        if($int < 10) {
            return 1;
        }
        return 0;
    }

}
