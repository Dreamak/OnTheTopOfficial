{{-- Layout principal --}}
@extends('layouts.app')

{{-- Section content --}}
@section('content')

<div class="container">
    <h1>Dashboard OnTheTop</h1>
    <hr>
    {{-- Liste des guildes --}}
    <div class="guilds">
        @foreach ($guilds as $guild)
            <div class="card mb-3">
                {{-- Cliquez sur le nom de la guilde pour afficher/cacher les membres --}}
                <div class="card-header" onclick="toggleMembers({{ $guild->id }})">
                    <h2 style="cursor:pointer;">{{ $guild->name }}</h2>
                    <p>Server: {{ $guild->server }}</p>
                </div>
                {{-- La liste des membres est masquée par défaut --}}
                <div class="card-body guild-members" id="guild-{{ $guild->id }}" style="display:none;">
                    <h3>Membres :</h3>
                    <ul>
                        @foreach ($guild->members as $member)
                            <li>
                                {{ $member->ingame_name }} - Power: {{ $member->power->power ?? 'N/A' }}
                                <small>Depuis le: {{ $member->power->date ?? 'N/A' }}</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
// Fonction pour afficher/cacher les membres d'une guilde
function toggleMembers(guildId) {
    var membersList = document.getElementById('guild-' + guildId);
    if (membersList.style.display === 'none') {
        membersList.style.display = 'block';
    } else {
        membersList.style.display = 'none';
    }
}
</script>

@endsection
