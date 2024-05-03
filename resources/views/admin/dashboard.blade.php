@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>
    <hr>
    <div class="row justify-content-center mt-5">
        <!-- Navbar -->

        <!-- Content Card -->
        <div class="col-6 card text-center mt-3">
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
                    @include('admin.partials._guilds')
                </div>
                <div id="item2Content" style="display: none;">
                    @include('admin.partials._members')
                </div>
                <div id="item3Content" style="display: none;">
                    @include('admin.partials._users')
                </div>
                <div id="item4Content" style="display: none;">
                    @include('admin.partials._gdc')
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

