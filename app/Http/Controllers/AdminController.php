<?php

namespace App\Http\Controllers;

use App\Models\{Guild, Member, Power, User, Role};
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $guilds = Guild::all();
        $members = Member::all();
        $users = User::with('role', 'member')->get();
        $roles = Role::all();
        return view('admin.dashboard', compact('guilds', 'members', 'users', 'roles'));
    }

    public function updateGuild(Request $request, Guild $guild)
    {
        $guild->update($request->all());
        return back()->with('success', 'Guilde mise à jour avec succès.');
    }

    public function updateMember(Request $request, Member $member)
    {
        $validatedData = $request->validate([
            'power' => 'required|numeric',
        ]);

        $member->update($request->all());
        $member->power->update([
            'power' => $validatedData['power'],
        ]);

        return back()->with('success', 'Membre mis à jour avec succès.');
    }

    public function storeGuild(Request $request)
{
    // Validation des données reçues
    $validatedData = $request->validate([
        'name' => 'required|string|max:255', // Assure-toi que les règles de validation correspondent à tes besoins
        'server' => 'required|numeric',      // Assure-toi que les règles de validation correspondent à tes besoins
        // Ajoute ici d'autres validations si nécessaire
    ]);

    // Création de la nouvelle guilde avec les données validées
    $guild = Guild::create([
        'name' => $validatedData['name'],
        'server' => $validatedData['server'],
        // Ajoute ici d'autres champs si tu as d'autres colonnes dans ta table guildes
    ]);

    // Redirection vers le dashboard admin avec un message de succès
    return redirect()->route('admin.dashboard')->with('success', 'Nouvelle guilde créée avec succès.');
}

    public function storeMember(Request $request)
    {
        $validatedData = $request->validate([
            'ingame_name' => 'required|string|max:255',
            'guild_id' => 'required|exists:guilds,id',
            'power' => 'required|numeric', // validation pour la saisie de la puissance
        ]);

        $power = Power::create([
            'power' => $validatedData['power'],
            'date' => Carbon::now(), // Utilise Carbon pour obtenir la date et l'heure actuelles
        ]);



        // Création du nouveau membre avec le power_id
        $member = new Member();
        $member->ingame_name = $validatedData['ingame_name'];
        $member->guilds_id = $validatedData['guild_id'];
        $member->powers_id = $power->id; // Ici, tu assignes l'ID du nouveau power créé
        $member->save();

        return back()->with('success', 'Membre ajouté avec succès.');
    }





    public function manageGuildMembers($guildId)
    {
        $guild = Guild::with('members')->findOrFail($guildId);
        $nonGuildMembers = Member::whereNotIn('id', $guild->members->pluck('id'))->get();

        // Assurez-vous de passer 'nonGuildMembers' à la vue
        return view('admin.manage-guild-members', compact('guild', 'nonGuildMembers'));
    }

    public function destroyMember(Member $member)
    {
        // Assurez-vous que les validations nécessaires soient effectuées ici (comme vérifier si l'utilisateur a le droit de supprimer ce membre)
        $member->delete();
        return back()->with('success', 'Membre supprimé avec succès.');
    }
    public function destroyGuild(Guild $guild)
    {
        // Gérer les relations ou les données liées comme expliqué précédemment
        // Par exemple, supprimer les relations ou les mettre à jour
        
        $guild->delete();
        return back()->with('success', 'Guilde supprimée avec succès.');
    }
}
