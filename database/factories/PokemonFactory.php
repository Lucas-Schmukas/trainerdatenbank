<?php

namespace Database\Factories;

use App\Models\Pokemon;
use App\Models\Typ;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pokedex;
use Illuminate\Support\Facades\DB;
use App\Services\WebScrapper;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            'spitzname' => fake()->jobTitle(),
            'geschlecht' => fake()->randomElement(['m', 'w']),
            'spezies' => Pokedex::getNameById(fake()->numberBetween(1, 151)),
            'pokeball' => fake()->randomElement(config('pokeball')),
            'gewicht' => $gewicht = fake()->numberBetween(50, 500), // in kg
            'groesse' => $gewicht + fake()->numberBetween(-10, 50) // in cm
        ];
    }
    public function configure()
    {

        return $this->afterCreating(function(Pokemon $pokemon){
            $pokemon->getSkillFromApi();
            $types = Pokedex::getTypeBySpezies($pokemon->spezies);
            foreach($types as $type){
                $typeId = Typ::getTypeIdByDescription($type);
                DB::table('gehoertAn')->insert([
                    'pokemonid' => $pokemon->id,
                    'typid' => $typeId,
            ]);
            }
});    }
}
