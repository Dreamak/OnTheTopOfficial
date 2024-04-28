@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>
    <div class="row">
        <div class="col-md-6">
            <h2>Guildes</h2>
            @foreach ($guilds as $guild)
                <form action="{{ route('guild.update', $guild) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label>Nom de la guilde</label>
                        <input type="text" name="name" value="{{ $guild->name }}" required>
                    </div>
                    <div>
                        <label>Puissance de la guilde</label>
                        <input type="number" name="power" value="{{ $guild->power }}" required>
                    </div>
                    <button type="submit">Mettre à jour</button>
                </form>
            @endforeach
        </div>
        <div class="col-md-6">
            <h2>Membres</h2>
            @foreach ($members as $member)
                <form action="{{ route('member.update', $member) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label>Nom du membre</label>
                        <input type="text" name="name" value="{{ $member->name }}" required>
                    </div>
                    <div>
                        <label>Puissance du membre</label>
                        <input type="number" name="power" value="{{ $member->power }}" required>
                    </div>
                    <button type="submit">Mettre à jour</button>
                </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
