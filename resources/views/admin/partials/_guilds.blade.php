<!-- _guilds.blade.php -->
<section class="mb-4">
    <h2 class="mb-3">Guilds</h2>
    <button type="button" class="btn btn-primary mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#addGuildModal">
        Add a guild
    </button>
    <div class="modal fade" id="addGuildModal" tabindex="-1" aria-labelledby="addGuildModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="addGuildModalLabel">New guild</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('guild.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="guildName" name="name" placeholder="Name" required>
                            <label for="guildName">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="guildserver" name="server" placeholder="Server" required>
                            <label for="guildserver">Server</label>
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

    @foreach ($guilds as $guild)
        <!-- Formulaire pour une guilde spécifique -->
        <div class="card border-secondary shadow mb-2">
            <div class="card-header p-3 clearfix">
                <h2 class="float-start">{{ $guild->name }}</h2>
                <form class="float-end p-1" action="{{ route('guild.destroy', $guild->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </form>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('guild.update', $guild) }}">
                    @csrf
                    @method('PATCH')
                    <div class="row align-items-center">
                        <div class="col form-floating">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $guild->name }}">
                            <label class="form-label">Name</label>
                        </div>
                        <div class="col form-floating">
                            <input type="text" class="form-control" name="server" placeholder="Server" value="{{ $guild->server }}">
                            <label class="form-label">Server:</label>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.guild.manage', $guild->id) }}" class="btn btn-info">Update Members</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</section>