@extends('layouts.app')

@section('content')
<div>
    <header class="guild-banner">
        <img src="{{ asset('images/bannier.jpg') }}" alt="Bannière OnTheTop" class="img-fluid banner"> <!-- Remplace 'ta-banniere.jpg' par le nom réel de ton fichier d'image -->
    </header>
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-6">
                <div class="card border-0 shadow">
                    <div class="card-header text-center">
                        <h2>Règlementation OnTheTop</h2>
                    </div>
                    <div class="card-body">
                        <h4>Vie de clan:</h4>
                        <ul>
                            <li>Posséder Discord et se tenir informé est une nécessité.</li>
                            <li>Le respect et la bienveillance est de mise entre les joueurs du clan.</li>
                            <li>Merci de saisir votre pseudo de jeu sur discord.</li>
                            <li>Tout afk en jeu de plus de 48 heures entrainera un kick automatique sauf si vous prévenez en amont.</li>
                        </ul>
                        <h4>Event de clan:</h4>
                        <ul>
                            <li>Les 5 dons / jour sont obligatoires.</li>
                            <li>Les inscriptions au Grumpy de 12h05 et 19h25 sont fortement conseillé sinon des sanctions pourront être mises, en cas d'absences merci de prévenir en amont.</li>
                        </ul>
                        <h4>Guerres de clan:</h4>
                        <ul>
                            <li>En période de GDC veuillez respecter vos placements qui seront notés dans <mark>⁠📣〣𝐀𝐧𝐧𝐨𝐧𝐜𝐞𝐬-𝐆𝐃𝐂</mark>, si ils ne sont pas respectés vous pourrez encourir une peines d'avertissement puis de kick si cela se reproduis.</li>
                        </ul>
                        <h4>Guerres de stationnement:</h4>
                        <ul>
                            <li>Les combats en parkings privés sont interdit, mais autorisé en parking public.</li>
                        </ul>
                        <h4>Dortoir de suiveur:</h4>
                        <ul>
                            <li>La capture de suiveurs appartenant à d'autres membres de la guilde est autorisé et cela va de même pour la défense d'autres joueurs détenu par un membre de la guilde.</li>
                        </ul>
                        <h4>Manoir:</h4>
                        <ul>
                            <li>Le vole de légumes d'un membre de la guilde est prohibé.</li>
                        </ul>
                        <h4>Arènes:</h4>
                        <ul>
                            <li>Les attaques en Arène et Match de classement inter-serveurs sont autorisés.</li>
                        </ul>
                    </div>
                </div>
            </div>    
            <div class="col-6">
                <div class="row">
                    <div class="col-12 pb-5">
                        <div class="card border-0 shadow">
                            <div class="card-header text-center">
                                <h2>OnTheTop, C'est quoi</h2>
                            </div>
                            <div class="card-body">
                                <p>Nous sommes OnTheTop une petite guilde qui vise le Sommet. Mais quelle sommet vous devez vous demandez bah le Sommet au dessus du sommet. Mais le plus important est d'arriver là-bas avec nos camarades Champignons.</p>
                            </div>
                        </div>
                    </div>    
                    <div class="col-12">
                        <div class="card border-0 shadow">
                            <div class="card-header text-center">
                                <h2>Informations de la Guilde</h2>
                            </div>
                            <div class="card-body">
                                <p><strong>Nom de la guilde :</strong> {{ $guild->name }}</p>
                                <p><strong>Puissance totale :</strong> {{ $guild->power }}</p>
                                <p><strong>Membres :</strong> {{ $guild->members->count() }}</p>
                                <h4>Top 5 des membres par Power</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Power</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($topMembers as $member)
                                        <tr>
                                            <th scope="row">{{ $member->ingame_name }}</th>
                                            <td>{{ $member->power }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Événements à venir</h4>
                    </div>
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
</div>
@endsection
