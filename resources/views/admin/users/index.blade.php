@extends('layouts.app')

@php
$roles = \App\Models\Role::all();
$members = \App\Models\Member::all();
@endphp


@section('content')
<div class="container">
    <h1>Gestion des Utilisateurs</h1>
    <hr>
    <button type="button" class="btn btn-primary mb-5 mt-3" data-bs-toggle="modal" data-bs-target="#createUserModal">
        Ajouter un Utilisateur
    </button>

    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Créer un nouvel utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailCreate" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="usernameCreate" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Rôle</label>
                            <select id="roleCreate" name="roles_id" class="form-select">
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-success">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow">
        <h2 class="card-header text-center">Tout les utilisateurs</h2>
        <div>
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
                <td>{{ $user->member ? $user->member->ingame_name : 'Aucun' }}</td>
                <td>
                    <button type="button" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#editUserModal-{{ $user->id }}">
                        Modifier
                    </button>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            <div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel-{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel-{{ $user->id }}">Modifier l'utilisateur: {{ $user->username }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="emailEdit-{{ $user->id }}" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailEdit-{{ $user->id }}" name="email" value="{{ $user->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="usernameEdit-{{ $user->id }}" class="form-label">Nom d'utilisateur</label>
                                    <input type="text" class="form-control" id="usernameEdit-{{ $user->id }}" name="username" value="{{ $user->username }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="roleEdit-{{ $user->id }}" class="form-label">Rôle</label>
                                    <select id="roleEdit-{{ $user->id }}" name="roles_id" class="form-select">
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}" @if($user->roles_id === $role->id) selected @endif>{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>`
                                <div class="mb-3">
                                    <label for="memberEdit-{{ $user->id }}" class="form-label">Member</label>
                                    <select id="memberEdit-{{ $user->id }}" name="members_id" class="form-select">
                                        <option value="">Choisir...</option>
                                        @foreach($members as $member)
                                        <option value="{{ $member->id }}" @if($user->members_id === $member->id) selected @endif>{{ $member->ingame_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="password-{{ $user->id }}" class="form-label">Nouveau mot de passe (laisser vide pour ne pas changer)</label>
                                    <input type="password" class="form-control" id="password-{{ $user->id }}" name="password">
                                </div>
                                <button type="submit" class="btn btn-success">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
