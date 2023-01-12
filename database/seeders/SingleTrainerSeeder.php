<?php

namespace Database\Seeders;

use App\Models\Pokedex;
use App\Models\Pokemon;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class SingleTrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Trainer::factory()
            ->has(Pokemon::factory()
                ->count(6)
                ->state(new Sequence(
                    [
                        'spezies' => $name = 'Gengar',
                        'faehigkeit' => Pokedex::getSkillByName($name),
                        'pokeball' => 'Luxusball'
                        ],
                    [
                        'spezies' => $name = 'Blitza',
                        'faehigkeit' => Pokedex::getSkillByName($name),
                        'pokeball' => 'Timerball'
                    ],
                    [
                        'spezies' => $name = 'Turtok',
                        'faehigkeit' => Pokedex::getSkillByName($name),
                        'pokeball' => 'Jubelball'
                    ],
                    [
                        'spezies' => $name = 'Machomei',
                        'faehigkeit' => Pokedex::getSkillByName($name),
                        'pokeball' => 'Hyperball'
                    ],
                    [
                        'spezies' => $name = 'Dodri',
                        'faehigkeit' => Pokedex::getSkillByName($name),
                        'pokeball' => 'Pokeball'
                    ],
                    [
                        'spezies' => $name = 'Nidoking',
                        'faehigkeit' => Pokedex::getSkillByName($name),
                        'pokeball' => 'Meisterball',
                        'geschlecht' => 'm'
                    ],
                )) )
            ->create(
                [
                    'name' => 'Dieb Leon',
                    'geburtsdatum' => '2002-09-28',
                    'istArenaleiter' => 0,
                ]
            );
    }
}
