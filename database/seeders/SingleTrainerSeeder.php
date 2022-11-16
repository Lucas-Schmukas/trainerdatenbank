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
                        'spezies' => $name = 'Impoleon',
                        'faehigkeit' => Pokedex::getSkillByName($name)
                        ],
                    [
                        'spezies' => $name = 'Kramshef',
                        'faehigkeit' => Pokedex::getSkillByName($name)
                    ],
                    [
                        'spezies' => $name = 'Stolloss',
                        'faehigkeit' => Pokedex::getSkillByName($name)
                    ],
                    [
                        'spezies' => $name = 'Gewaldro',
                        'faehigkeit' => Pokedex::getSkillByName($name),
                        'geschlecht' => 'm'
                    ],
                    [
                        'spezies' => $name = 'Luxtra',
                        'faehigkeit' => Pokedex::getSkillByName($name)
                    ],
                    [
                        'spezies' => $name = 'Knakrack',
                        'faehigkeit' => Pokedex::getSkillByName($name)
                    ],
                )) )
            ->create(
                [
                    'name' => 'Reik',
                    'geburtsdatum' => '1999-08-29',
                    'istArenaleiter' => 0
                ]
            );

    }
}
