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
            ['name' => 'OnTheTop', 'server' => 360004],
            ['name' => 'TheLastHope', 'server' => 360004],
            // Ajoute plus si nécessaire...
        ]);
    }
}
