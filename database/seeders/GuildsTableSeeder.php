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
            ['name' => 'Legendary', 'server' => 360004],
            ['name' => 'HariboGang', 'server' => 360004],
            ['name' => 'Mugiwara', 'server' => 360004],
            ['name' => 'Batcave', 'server' => 360004],
            ['name' => 'GuildFR', 'server' => 360004],
            // Ajoute plus si nécessaire...
        ]);
    }
}
