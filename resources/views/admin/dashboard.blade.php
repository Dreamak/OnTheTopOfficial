@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>

    <!-- Gestion des guildes -->
    <section>
        <h2>Guildes</h2>
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
            <form method="POST" action="{{ route('guild.update', $guild) }}">
                @csrf
                @method('PATCH')

                <div>
                    <label>Nom:</label>
                    <input type="text" name="name" value="{{ $guild->name }}">
                    <input type="text" name="server" value="{{ $guild->server }}">
                    <a href="{{ route('admin.guild.manage', $guild->id) }}" class="btn btn-info">Modifier les Membres</a>
                </div>
                <!-- Autres champs... -->
                <button type="submit">Mettre à jour</button>
            </form>
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
        <form method="POST" action="{{ route('member.update', $member) }}">
            @csrf
            @method('PATCH')

                <div>
                    <label>Nom:</label>
                    <input type="text" name="ingame_name" value="{{ $member->ingame_name }}">
                    <input type="text" name="power" value="{{ $member->power->power }}">
                </div>
                <!-- Autres champs... -->
                <button type="submit">Mettre à jour</button>
            </form>
        @endforeach
    </section>
</div>
@endsection

