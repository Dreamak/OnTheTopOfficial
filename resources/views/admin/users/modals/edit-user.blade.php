{{-- admin/users/modals/edit-user.blade.php --}}
@foreach($users as $user)
    <div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel-{{ $user->id }}" aria-hidden="true">
        <div class="container">
            <h1>Modifier l'utilisateur: {{ $user->username }}</h1>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailEdit-{{ $user->id }}" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="usernameEdit-{{ $user->id }}" name="username" value="{{ $user->username }}" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Rôle</label>
                    <select id="roleEdit-{{ $user->id }}" name="roles_id" class="form-select">
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}" @if($user->roles_id === $role->id) selected @endif>{{ $role->role_name }}</option>
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
@endforeach
