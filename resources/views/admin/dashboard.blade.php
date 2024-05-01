@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>
    <hr>
    <div class="mt-5">
        <!-- Navbar -->

        <!-- Content Card -->
        <div class="card text-center mt-3">
            <div class="card-header">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" id="link1">Manage Guilds</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="link2">Manage Members</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="link3">Manage Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="link4">Manage GDC</a>
                    </li>
                </ul>
            </div>
            <div class="card-body" id="cardContent">
                <!-- Initial content for Item 1 will be included directly here -->
                <div id="item1Content">
                    <section class="mb-4 col-8">
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
                </div>
                <div id="item2Content" style="display: none;">
                    <section class="mb-4 col-8">
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
                </div>
                <div id="item3Content" style="display: none;">
                    <section class="mb-4 col-12 col-md-6">
                        <h2 class="mb-3">Users</h2>
                        <button type="button" class="btn btn-primary mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                            Add a user
                        </button>
                        <!-- Modal for adding members -->
                        <!-- Your modal HTML here -->
                        @foreach ($members as $member)
                        <!-- Card for each member -->
                        <!-- Your card HTML here -->
                        @endforeach
                    </section>
                </div>
                <div id="item4Content" style="display: none;">
                    <section class="mb-4 col-12 col-md-6">
                        <h2 class="mb-3">GDC</h2>
                        <button type="button" class="btn btn-primary mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                            Add a GDC
                        </button>
                        <!-- Modal for adding members -->
                        <!-- Your modal HTML here -->
                        @foreach ($members as $member)
                        <!-- Card for each member -->
                        <!-- Your card HTML here -->
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fonction pour activer le contenu de l'onglet et gérer la classe active
        function activateTab(activeContentId) {
            // Liste de tous les contenus
            var contents = ['item1Content', 'item2Content', 'item3Content', 'item4Content'];
            // Liste de tous les liens de la navbar
            var links = ['link1', 'link2', 'link3', 'link4'];
    
            // Gestion de la visibilité des contenus et de la classe active
            contents.forEach(function(id, index) {
                var contentElement = document.getElementById(id);
                var linkElement = document.getElementById(links[index]);
                if (id === activeContentId) {
                    contentElement.style.display = ''; // Montrer le contenu actif
                    linkElement.classList.add('active'); // Ajouter la classe active
                } else {
                    contentElement.style.display = 'none'; // Cacher les autres contenus
                    linkElement.classList.remove('active'); // Retirer la classe active
                }
            });
        }
    
        // Écouteurs d'événements pour les liens de la navbar
        document.getElementById('link1').addEventListener('click', function() {
            activateTab('item1Content');
        });
        document.getElementById('link2').addEventListener('click', function() {
            activateTab('item2Content');
        });
        document.getElementById('link3').addEventListener('click', function() {
            activateTab('item3Content');
        });
        document.getElementById('link4').addEventListener('click', function() {
            activateTab('item4Content');
        });
    </script>
    </div>    
</div>
@endsection

