<section class="mb-4">
    <h2 class="mb-3">Members</h2>
    <button type="button" class="btn btn-primary mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#addMemberModal">
        Add a member
    </button>
    <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="addMemberModalLabel">New member</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('member.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3 form-floating">
                            <input type="text" class="form-control" id="ingame_name" name="ingame_name" placeholder="Name" required>
                            <label for="ingame_name" class="form-label">Name</label>                                    
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="number" class="form-control" id="power" name="power" placeholder="Power" required>
                            <label for="power" class="form-label">Power</label>                                    
                        </div>
                        <div class="form-group form-floating">
                            <select class="form-control" id="guildSelect" name="guild_id">
                                @foreach ($guilds as $guild)
                                    <option value="{{ $guild->id }}">{{ $guild->name }}</option>
                                @endforeach
                            </select>
                            <label for="guildSelect">Guild</label>  
                        </div>
                        <!-- Ajoute ici d'autres champs si nécessaire -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($members as $member)
        <div class="card border-secondary shadow mb-2">
            <div class="card-header p-3 clearfix">
                <h2 class="float-start">{{ $member->ingame_name }}</h2>
                <form class="float-end p-1" action="{{ route('member.destroy', $member) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </form>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('member.update', $member) }}">
                    @csrf
                    @method('PATCH')
                    <div class="row align-items-center">
                        <div class="col form-floating">                                    
                            <input type="text" class="form-control" name="ingame_name" placeholder="Name" value="{{ $member->ingame_name }}">
                            <label>Name:</label>
                        </div>
                        <div class="col form-floating">                                   
                            <input type="number" class="form-control" name="power" placeholder="Power" value="{{ $member->power->power }}">
                            <label>Power:</label>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</section>