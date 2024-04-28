@extends('layouts.app')

@section('content')
    <h1>Membres de la Guilde: {{ $guild->name }}</h1>
    <!-- Formulaire pour ajouter un nouveau membre -->
    <form action="{{ route('guilds.add-member', $guild->id) }}" method="POST">
        @csrf
        <input type="hidden" name="guild_id" value="{{ $guild->id }}">

        <!-- Liste déroulante des membres disponibles -->
        <label for="member_id">Ajouter un membre à la guilde :</label>
        <select name="member_id" id="member_id" class="form-control">
            @foreach ($nonGuildMembers as $member)
                <option value="{{ $member->id }}">{{ $member->ingame_name }}</option>
            @endforeach
        </select>
        <button type="submit">Ajouter</button>
    </form>

    @foreach ($guild->members as $member)
    <!-- Formulaire pour modifier un membre -->
    <form method="POST" action="{{ route('member.update', $member) }}">
        @csrf
        @method('PATCH')
        <div>
            <label>Nom:</label>
            <input type="text" name="ingame_name" value="{{ $member->ingame_name }}">
            <input type="text" name="power" value="{{ $member->power->power }}">
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
    <!-- Formulaire séparé pour supprimer un membre de la guilde -->
    <form action="{{ route('members.remove-from-guild', $member->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('PATCH') <!-- Ou @method('DELETE') si vous préférez -->
        <button type="submit" class="btn btn-danger">Supprimer de la guilde</button>
    </form>
@endforeach


@endsection
