@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-3">Membres de la Guilde: {{ $guild->name }}</h1>
    <!-- Formulaire pour ajouter un nouveau membre -->
    <div class="mb-4">
        <form action="{{ route('guilds.add-member', $guild->id) }}" method="POST" class="form-inline">
            @csrf
            <div class="form-group mr-2">
                <select name="member_id" id="member_id" class="form-control">
                    @foreach ($nonGuildMembers as $member)
                        <option value="{{ $member->id }}">{{ $member->ingame_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <div class="list-group">
        @foreach ($guild->members as $member)
        <div class="list-group-item">
            <form method="POST" action="{{ route('member.update', $member) }}" class="d-flex align-items-center justify-content-between">
                @csrf
                @method('PATCH')
                <div class="form-group mb-0">
                    <label class="mr-2">Nom: {{ $member->ingame_name }}</label>
                    <input type="text" name="power" class="form-control d-inline-block" style="width: auto;" value="{{ $member->power->power }}">
                </div>
                <button type="submit" class="btn btn-info mr-2">Mettre à jour</button>
            </form>
            <form action="{{ route('members.remove-from-guild', $member->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH') <!-- Ou DELETE si applicable -->
                <button type="submit" class="btn btn-danger">Supprimer de la guilde</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
