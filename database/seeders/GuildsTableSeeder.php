<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuildsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('guilds')->insert([
            ['name' => 'OnTheTop', 'power' => 1000000],
            ['name' => 'TheLastHope', 'power' => 1500000],
            // Ajoute plus si nécessaire...
        ]);
    }
}
