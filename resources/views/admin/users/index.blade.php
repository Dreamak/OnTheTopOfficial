@extends('layouts.app')

@php
$roles = \App\Models\Role::all();
$members = \App\Models\Member::all();
@endphp


@section('content')
<div class="container">
    <h2>User</h2>
    <hr>
    <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#createUserModal">
        Add an user
    </button>

    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="createUserModalLabel">Créer un nouvel utilisateur</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('users.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3 form-floating">
                            <input type="email" class="form-control" id="emailCreate" name="email" placeholder="Email" required>
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" class="form-control" id="usernameCreate" name="username" placeholder="Username" required>
                            <label for="username" class="form-label">Username</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <select id="roleCreate" name="roles_id" class="form-select">
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                            <label for="role" class="form-label">Role</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password" class="form-label">Password</label>
                        </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-around">
            <div class="card border-secondary shadow p-4">
                <table class="table">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>associated member</th>
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
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel-{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="editUserModalLabel-{{ $user->id }}">Edit User: {{ $user->username }}</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3 form-floating">
                                                <input type="email" class="form-control" id="emailEdit-{{ $user->id }}" name="email" value="{{ $user->email }}" required>
                                                <label for="emailEdit-{{ $user->id }}" class="form-label">Email</label>
                                            </div>
                                            <div class="mb-3 form-floating">
                                                <input type="text" class="form-control" id="usernameEdit-{{ $user->id }}" name="username" value="{{ $user->username }}" required>
                                                <label for="usernameEdit-{{ $user->id }}" class="form-label">Username</label>
                                            </div>
                                            <div class="mb-3 form-floating">
                                                <select id="roleEdit-{{ $user->id }}" name="roles_id" class="form-select">
                                                    @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" @if($user->roles_id === $role->id) selected @endif>{{ $role->role_name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="roleEdit-{{ $user->id }}" class="form-label">Role</label>
                                            </div>
                                            <div class="mb-3 form-floating">
                                                <select id="memberEdit-{{ $user->id }}" name="members_id" class="form-select">
                                                    <option value="">Choose...</option>
                                                    @foreach($members as $member)
                                                    <option value="{{ $member->id }}" @if($user->members_id === $member->id) selected @endif>{{ $member->ingame_name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="memberEdit-{{ $user->id }}" class="form-label">Member</label>
                                            </div>
                                            <div class="mb-3 form-floating">
                                                <input type="password" class="form-control" id="password-{{ $user->id }}" name="password">
                                                <label for="password-{{ $user->id }}" class="form-label">New password (let it empty if no changes)</label>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Update</button>
                                            </div>
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
</div>
@endsection
