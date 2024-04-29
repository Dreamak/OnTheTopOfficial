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
                <div class="card-header">
                    <h2>{{ $guild->name }}</h2>
                    <p>Power: {{ $guild->power }}</p>
                </div>
                <div class="card-body">
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

@endsection
