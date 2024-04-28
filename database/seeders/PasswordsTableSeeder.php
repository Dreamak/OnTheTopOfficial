<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('passwords')->insert([
            ['password' => Hash::make('admin')], // Exemple de mot de passe hashé
            ['password' => Hash::make('admin')],

            // Ajoute plus si nécessaire...
        ]);
    }
}
