<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Guild;

class MemberController extends Controller
{
    // Affiche une liste de tous les membres
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    // Montre le formulaire de création d'un nouveau membre
    public function create()
    {
        $guilds = Guild::all(); // Si vous avez une table de guildes
        return view('members.create', compact('guilds'));
    }

    // Stocke un nouveau membre dans la base de données
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            // autres règles de validation
        ]);

        $member = new Member($validatedData);
        $member->save();

        return redirect()->route('members.index')->with('success', 'Member has been created successfully.');
    }

    // Affiche un membre spécifique
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }

    // Montre le formulaire d'édition pour un membre spécifique
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $guilds = Guild::all(); // Si vous avez besoin de la liste des guildes pour l'édition
        return view('members.edit', compact('member', 'guilds'));
    }

    // Met à jour le membre dans la base de données
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255',

            // autres règles de validation
        ]);

        $member = Member::findOrFail($id);
        $member->update($validatedData);

        return redirect()->route('members.index')->with('success', 'Member has been updated successfully.');
    }

    // Supprime un membre
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member has been deleted successfully.');
    }

    public function editGuildMembers($guildId)
    {
        // Récupère la guilde spécifique par son ID
        $guild = Guild::findOrFail($guildId);

        // Récupère tous les membres qui ne sont pas dans cette guilde
        $nonGuildMembers = Member::where('guild_id', '!=', $guildId)->orWhereNull('guild_id')->get();

        // Passe la guilde et les membres non-guild à la vue
        return view('guilds.edit-members', compact('guild', 'nonGuildMembers'));
    }

    public function addMemberToGuild(Request $request, $guildId)
    {
        $validatedData = $request->validate([
            'member_id' => 'required|exists:members,id'
        ]);

        $guild = Guild::findOrFail($guildId);
        $member = Member::findOrFail($validatedData['member_id']);

        // Supposant que vous ayez une relation one-to-many de Guild à Member:
        $member->guilds_id = $guild->id;
        $member->save();

        return back()->with('success', 'Member has been added to the guild successfully.');
    }

    public function removeFromGuild(Request $request, $memberId)
    {
        $member = Member::findOrFail($memberId);
        $member->guilds_id = null; // Mettez à jour le champ 'guilds_id' à 'null'
        $member->save();
        
        return back()->with('success', 'Le membre a été retiré de la guilde.');
    }
}
