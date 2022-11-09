<?php

namespace Database\Factories;

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
            'geburtsdatum' => fake()->dateTimeBetween(['-60 years', '-14 years'])->format('YYYY-MM-DD'),
            'region' => fake()->city(),
            'geld' => fake()->randomNumber(6, false),
            'istArenaleiter' => $this->setArenaleiterbyChance(fake()->randomNumber(3, false)), //change of being Arenaleiter is 1%
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function(Trainer $trainer){
            PokemonFactory::factory()->count(rand(1,6))->create([
                'trainerId' => $trainer->id,
            ]);
        });
    }

    private function setArenaleiterbyChance(int $int) : int
    {
        if($int < 10) {
            return 1;
        }
        return 0;
    }

}
