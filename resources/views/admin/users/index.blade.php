@extends('layouts.app')

@php
$roles = \App\Models\Role::all(); // Assurez-vous d'importer le modèle Role si nécessaire.
@endphp

@include('admin.users.modals.create-user', ['roles' => $roles])
@include('admin.users.modals.edit-user', ['roles' => $roles, 'users' => $users])


@section('content')
<div class="container">
    <h1>Gestion des Utilisateurs</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
        Ajouter un Utilisateur
    </button>
    <table class="table">
        <thead>
            <tr>
                <th>Email</th>
                <th>Nom d'utilisateur</th>
                <th>Rôle</th>
                <th>Membre Associé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->email }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->role->role_name }}</td>
                <td>{{ $user->member ? $user->member->name : 'Aucun' }}</td>
                <td>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editUserModal-{{ $user->id }}">
                        Modifier
                    </button>
                    
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
