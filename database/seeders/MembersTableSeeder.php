<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Assure-toi d'avoir déjà des guildes et des pouvoirs créés pour ces ID
        DB::table('members')->insert([
            ['ingame_name' => 'Dreamak_', 'guilds_id' => 1, 'powers_id' => 1],
            ['ingame_name' => 'Ethan', 'guilds_id' => 2, 'powers_id' => 2],
            ['ingame_name' => 'Random', 'guilds_id' => 1, 'powers_id' => 2],
            // Ajoute plus si nécessaire...
        ]);
    }
}
