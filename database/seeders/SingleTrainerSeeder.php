<?php

namespace Database\Seeders;

use App\Models\Pokedex;
use App\Models\Pokemon;
use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                        'spezies' => $name = 'Mimigma',
                        'faehigkeit' => Pokedex::getSkillByName($name)
                        ],
                    [
                        'spezies' => $name = 'Sleimok',
                        'faehigkeit' => Pokedex::getSkillByName($name)
                    ],
                    [
                        'spezies' => $name = 'Cerapendra',
                        'faehigkeit' => Pokedex::getSkillByName($name)
                    ],
                    [
                        'spezies' => $name = 'Zytomega',
                        'faehigkeit' => Pokedex::getSkillByName($name),
                        'geschlecht' => 'm'
                    ],
                    [
                        'spezies' => $name = 'Aggrostella',
                        'faehigkeit' => Pokedex::getSkillByName($name)
                    ],
                    [
                        'spezies' => $name = 'Meteno',
                        'faehigkeit' => Pokedex::getSkillByName($name)
                    ],
                )) )
            ->create(
                [
                    'name' => 'Team Rocket Lucas ',
                    'geburtsdatum' => '',
                    'istArenaleiter' => 0
                ]
            );

    }
}
