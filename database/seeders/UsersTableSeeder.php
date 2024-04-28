<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Assure-toi de créer d'abord les rôles et les mots de passe correspondants avant d'exécuter ce seeder
        DB::table('users')->insert([
            [
                'email' => 'user@example.com',
                'username' => 'example',
                'roles_id' => 1, // ID du rôle correspondant
                'members_id' => null, // Ou un ID valide si tu as déjà des membres
                'passwords_id' => 1 // ID du mot de passe correspondant
            ],

            [
                'email' => 'nathan.demierre@gmail.com',
                'username' => 'Dreamak_',
                'roles_id' => 2, // ID du rôle correspondant
                'members_id' => null, // Ou un ID valide si tu as déjà des membres
                'passwords_id' => 1 // ID du mot de passe correspondant
            ],

            [
                'email' => 'bnathan.demierre@gmail.com',
                'username' => 'Dreamak_OTT',
                'roles_id' => 3, // ID du rôle correspondant
                'members_id' => null, // Ou un ID valide si tu as déjà des membres
                'passwords_id' => 2 // ID du mot de passe correspondant
            ],
            // Plus d'utilisateurs si nécessaire...
        ]);
    }
}
