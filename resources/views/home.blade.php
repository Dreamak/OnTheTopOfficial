@extends('layouts.app')

@section('content')


        <header class="guild-banner">
            <img src="{{ asset('images/bannier.jpg') }}" alt="Bannière OnTheTop" class="img-fluid banner"> <!-- Remplace 'ta-banniere.jpg' par le nom réel de ton fichier d'image -->
        </header>

        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h2 class="h4 card-title">OnTheTop, C'est quoi</h2>
                        <p>Nous sommes OnTheTop une petite guilde qui vise le Sommet. Mais quelle sommet vous devez vous demandez bah le Sommet au dessus du sommet. Mais le plus important est d'arriver là-bas avec nos camarades Champignons.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow">
                    <div class="card-header">Informations de la Guilde</div>
                    <div class="card-body">
                        <p><strong>Nom de la guilde :</strong> {{ $guild->name }}</p>
                        <p><strong>Puissance totale :</strong> {{ $guild->power }}</p>
                        <p><strong>Membres :</strong> {{ $guild->members->count() }}</p>
                    </div>
                </div>
            </div>
        </div>



        <div class="row my-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Événements à venir</div>
                    <div class="card-body">
                        <ul>
                            @foreach ($events as $event)
                                <li>
                                    {{ $event->name }} -
                                    {{ $event->start_time->format('d/m/Y H:i:s') }} à
                                    {{ $event->end_time->format('d/m/Y H:i:s') }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
