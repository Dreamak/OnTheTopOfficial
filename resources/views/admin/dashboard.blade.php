@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>

    <!-- Gestion des guildes -->
    <section class="mb-4">
        <h2 class="mb-3">Guildes</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGuildModal">
            Ajouter une Guilde
        </button>
        <div class="modal fade" id="addGuildModal" tabindex="-1" aria-labelledby="addGuildModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addGuildModalLabel">Nouvelle Guilde</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('guild.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="guildName" class="form-label">Nom de la guilde</label>
                                <input type="text" class="form-control" id="guildName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="guildserver" class="form-label">server</label>
                                <input type="text" class="form-control" id="guildserver" name="server" required>
                            </div>
                            <!-- Ajoute ici d'autres champs si nécessaire -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($guilds as $guild)
            <!-- Formulaire pour une guilde spécifique -->
            <div class="card mb-2">
                <div class="card-body">
                    <form method="POST" action="{{ route('guild.update', $guild) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row align-items-center">
                            <div class="col">
                                <label>Nom:</label>
                                <input type="text" class="form-control" name="name" value="{{ $guild->name }}">
                            </div>
                            <div class="col">
                                <label>Server:</label>
                                <input type="text" class="form-control" name="server" value="{{ $guild->server }}">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                <a href="{{ route('admin.guild.manage', $guild->id) }}" class="btn btn-info">Modifier les Membres</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </section>

    <!-- Gestion des membres -->
    <section>
        <h2>Membres</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMemberModal">
            Ajouter un Membre
        </button>
        <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMemberModalLabel">Nouveau Membre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('member.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="ingame_name" class="form-label">Nom du membre</label>
                                <input type="text" class="form-control" id="ingame_name" name="ingame_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="power" class="form-label">Power</label>
                                <input type="number" class="form-control" id="power" name="power" required>
                            </div>
                            <div class="form-group">
                                <label for="guildSelect">Guilde</label>
                                <select class="form-control" id="guildSelect" name="guild_id">
                                    @foreach ($guilds as $guild)
                                        <option value="{{ $guild->id }}">{{ $guild->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Ajoute ici d'autres champs si nécessaire -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @foreach ($members as $member)
            <div class="card mb-2">
                <div class="card-body">
                    <form method="POST" action="{{ route('member.update', $member) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row align-items-center">
                            <div class="col">
                                <label>Nom:</label>
                                <input type="text" class="form-control" name="ingame_name" value="{{ $member->ingame_name }}">
                            </div>
                            <div class="col">
                                <label>Power:</label>
                                <input type="number" class="form-control" name="power" value="{{ $member->power->power }}">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </section>
</div>
@endsection

