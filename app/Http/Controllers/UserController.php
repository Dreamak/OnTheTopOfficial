<?php

namespace App\Http\Controllers;

Use App\Models\User;
use App\Models\Member;
use App\Models\Role; // Assurez-vous que cette classe existe si vous utilisez un système de rôles.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role', 'member')->get(); // Modifier selon la structure de votre base de données
        $members = Member::all();
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
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'roles_id' => 'required|exists:roles,id',
            'password' => 'required',
            // Autres champs si nécessaire...
        ]);

        $password = \App\Models\Password::create([
            'password' => Hash::make($validatedData['password']),
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'roles_id' => $validatedData['roles_id'],
            'passwords_id' => $password->id,
            // 'members_id' peut être défini ici si nécessaire, ou laissé à null pour être défini plus tard.
        ]);
        return back()->with('success', 'Utilisateur créé avec succès.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id, // Assurez-vous que l'email est unique, sauf pour l'utilisateur actuel
            'username' => 'required',
            'roles_id' => 'required|exists:roles,id',
            'password' => 'nullable|min:6',
            'members_id' => 'nullable|exists:members,id',
        ]);

        $user->update([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'roles_id' => $validatedData['roles_id'],
            'members_id' => $validatedData['members_id'],
        ]);

        if ($request->filled('password')) {
            // Vérifiez si un enregistrement de mot de passe existe déjà pour cet utilisateur.
            if ($user->passwordRecord) {
                // Si oui, mettez à jour le mot de passe.
                $password = Hash::make($request['password']);
                $user->passwordRecord->update(['password' => $password]);
            } else {
                // Si non, vous devrez probablement créer un nouvel enregistrement de mot de passe ici.
                // Ceci dépend de votre logique de gestion des mots de passe.
            }
        }

        return back()->with('success', 'Utilisateur créé avec succès.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Utilisateur supprimé avec succès.');
    }
}
