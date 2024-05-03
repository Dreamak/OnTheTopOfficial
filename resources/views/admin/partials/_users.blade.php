<section class="mb-4">
    <h2 class="mb-3">Users</h2>
    <button type="button" class="btn btn-primary mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#createUserModal">
        Add User
    </button>

    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

    @foreach($users as $user)
    <div class="card border-secondary shadow mb-2">
        <div class="card-header p-3 clearfix">
            <h2 class="float-start">{{ $user->username }}</h2>
            <form class="float-end p-1" action="{{ route('user.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </form>
        </div>
        <div class="card-body">  
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row align-items-center">
                    <div class="col-4 mb-3 form-floating">
                        <input type="email" class="form-control" id="emailEdit-{{ $user->id }}" name="email" value="{{ $user->email }}" required>
                        <label for="emailEdit-{{ $user->id }}" class="form-label">Email</label>
                    </div>
                    <div class="col-4 mb-3 form-floating">
                        <input type="text" class="form-control" id="usernameEdit-{{ $user->id }}" name="username" value="{{ $user->username }}" required>
                        <label for="usernameEdit-{{ $user->id }}" class="form-label">Username</label>
                    </div>
                    <div class="col-4 mb-3 form-floating">
                        <select id="roleEdit-{{ $user->id }}" name="roles_id" class="form-select">
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" @if($user->roles_id === $role->id) selected @endif>{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                        <label for="roleEdit-{{ $user->id }}" class="form-label">Role</label>
                    </div>
                    <div class="col-4 mb-3 form-floating">
                        <select id="memberEdit-{{ $user->id }}" name="members_id" class="form-select">
                            <option value="">Choose...</option>
                            @foreach($members as $member)
                            <option value="{{ $member->id }}" @if($user->members_id === $member->id) selected @endif>{{ $member->ingame_name }}</option>
                            @endforeach
                        </select>
                        <label for="memberEdit-{{ $user->id }}" class="form-label">Member</label>
                    </div>
                    <div class="col-4 mb-3 form-floating">
                        <input type="password" class="form-control" id="password-{{ $user->id }}" name="password">
                        <label for="password-{{ $user->id }}" class="form-label">password</label>
                    </div>
                    <button type="submit" class="col-4 btn btn-primary mb-3">Update</button>
                </div>
            </form>
            <p class="text-end m-0 text-danger"><small>*Only change what you want to change</small></p>  
        </div>
    </div>
    @endforeach
</section>