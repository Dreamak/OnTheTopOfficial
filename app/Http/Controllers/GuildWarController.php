<?php

namespace App\Http\Controllers;

use App\Models\Guildwar;
use App\Models\Guild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuildWarController extends Controller
{
    public function index()
    {
        $guilds = Guild::all();
        $wars = Guildwar::all();

        return view('admin.guildwars.index', compact('wars', 'guilds'));
    }


    public function create()
    {
        $guilds = Guild::all();
        return view('admin.guildwars.create', compact('guilds'));
    }

    public function store(Request $request)
    {
        // Valider les données entrantes
        $validatedData = $request->validate([
            'date' => 'required|date',
            'image' => 'nullable|image|max:2048',
            'enemy1' => 'required|exists:guilds,id',
            'enemy2' => 'required|exists:guilds,id',
            'enemy3' => 'required|exists:guilds,id',
        ]);

        // Création de la guerre de guilde
        $war = new Guildwar();
        $war->date = $validatedData['date'];
        $war->result = null; // Le résultat est initialisé à null
        $war->onthetop = 1;
        $war->enemy_id_1 = $validatedData['enemy1']; // Utilisation des clés correctes
        $war->enemy_id_2 = $validatedData['enemy2'];
        $war->enemy_id_3 = $validatedData['enemy3'];

        // Gestion de l'image si elle existe
        if ($request->hasFile('image')) {
            $war->image = $request->file('image')->store('guild_wars', 'public');
        }

        // Sauvegarde de l'objet Guild_War
        $war->save();

        // Redirection avec un message de succès
        return redirect()->route('admin.guildwars.index')->with('success', 'La guerre a été ajoutée avec succès.');
    }

    public function edit($id)
    {
        $guilds = Guild::all();
        $war = Guildwar::findOrFail($id);
        return view('admin.guildwars.edit', compact('guilds', 'war'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'image' => 'nullable|image|max:2048',
            'enemy1' => 'required|exists:guilds,id',
            'enemy2' => 'required|exists:guilds,id',
            'enemy3' => 'required|exists:guilds,id',
        ]);

        $war = Guildwar::findOrFail($id);
        $war->date = $validatedData->date;
        $war->onthetop = 1;
        $war->enemy_id_1 = $request->enemy1;
        $war->enemy_id_2 = $request->enemy2;
        $war->enemy_id_3 = $request->enemy3;

        if ($request->hasFile('image')) {

            if ($war->image) {
                Storage::delete($war->image);
            }
            $war->image = $request->file('image')->store('guild_wars', 'public');
        }

        $war->save();

        // Mise à jour des guildes participants
        $war->guilds()->sync($request->guilds);

        return redirect()->route('admin.guildwars.index')->with('success', 'La guerre a été mise à jour avec succès.');
    }

    public function showCurrentWar()
    {
        $currentWar = GuildWar::where('date', today())->firstOrFail();
        return view('guildwars.show', compact('currentWar'));
    }
}
