<?php

namespace App\Http\Controllers;

Use App\Models\User;
use App\Models\Member;
use App\Models\Role; // Assurez-vous que cette classe existe si vous utilisez un système de rôles.
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role', 'member')->get(); // Modifier selon la structure de votre base de données
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // Assurez-vous d'avoir importé le modèle Role au-dessus de la classe du contrôleur.
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Vos règles de validation
        ]);

        $user = User::create($validatedData);
        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            // Vos règles de validation
        ]);

        $user->update($validatedData);
        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
