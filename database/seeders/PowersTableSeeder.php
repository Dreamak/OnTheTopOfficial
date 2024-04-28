<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('powers')->insert([
            ['power' => '27000', 'date' => now()],
            ['power' => '25000', 'date' => now()],
            ['power' => '53', 'date' => now()],
            // Ajoute plus si nécessaire...
        ]);
    }
}
