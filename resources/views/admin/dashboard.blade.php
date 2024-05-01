@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>
    <hr>

    <!-- Gestion des guildes -->
    <div class="container">
        <div class="row justify-content-around">
        <section class="mb-4 col-12 col-md-6">
            <h2 class="mb-3">Guilds</h2>
            <button type="button" class="btn btn-primary mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#addGuildModal">
                Add a guild
            </button>
            <div class="modal fade" id="addGuildModal" tabindex="-1" aria-labelledby="addGuildModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addGuildModalLabel">New guild</h5>
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
                <div class="card mb-2">
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

        <!-- Gestion des membres -->
        <section class="col-12 col-md-6">
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
                <div class="card mb-2">
                    <div class="card-header p-3 clearfix">
                        <h2 class="float-start">{{ $guild->name }}</h2>
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
        </div>
    </div>    
</div>
@endsection

