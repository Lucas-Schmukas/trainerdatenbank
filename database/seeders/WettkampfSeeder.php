<?php

namespace Database\Seeders;

use App\Models\Wettkampf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WettkampfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wettkampf::factory()
            ->count(50000)
            ->create();
    }
}
