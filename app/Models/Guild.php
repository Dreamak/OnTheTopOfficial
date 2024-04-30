<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{

    protected $fillable = ['name', 'server'];

    public function members()
    {
        return $this->hasMany(Member::class, 'guilds_id', 'id');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Assurez-vous que le nom est fourni et qu'il est valide
            // Ajoutez toute autre validation nécessaire pour les autres champs
        ]);

        $guild = new Guild; // Utilisez votre modèle de guilde
        $guild->name = $request->name;
        // Assignez d'autres propriétés si nécessaire
        $guild->save(); // Sauvegardez la guilde dans la base de données

        return redirect()->route('guilds.index')->with('success', 'Guilde créée avec succès !');
    }

    public function wars()
    {
        return $this->hasMany(Guildwar::class, 'enemy_id_1') // Supposons que 'enemy_id_1' représente une guilde
                    ->orWhere('enemy_id_2', $this->id)
                    ->orWhere('enemy_id_3', $this->id);
    }
}
