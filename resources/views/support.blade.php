@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Support</h1>
    <hr>
    <div class="container justify-content-around">
        <div class="row justify-content-around">
            <div class="col-12 col-md-4 mt-5">
                <div class="card border-secondary shadow">
                    <img src="{{ asset('images/dreamak_pp.gif') }}" class="card-img-top rounded" alt="Discord profile picture of Dreamak">
                    <div class="card-body">
                        <h3 class="card-title">Dreamak_</h3>
                        <ul>
                            <li>21 ans</li>
                            <li>Discord: dreamak_</li>
                        </ul>
                        <h4>Description</h4>
                        <p class="card-text">Rencontrez Dreamak_, 21 ans, le magicien des réseaux qui trouve plus de bugs avant le petit-déjeuner que la plupart d'entre nous en une journée. Ce virtuose de la VLAN peut vous expliquer la différence entre TCP et UDP, tout en jonglant avec trois serveurs et en buvant son quatrième expresso. Si Internet était un sport, Dreamak_ serait déjà qualifié pour les Jeux Olympiques de la connectivité!</p>
                        <a href="https://www.discordapp.com/users/384784276635385868">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#7289da" class="bi bi-discord" viewBox="0 0 16 16">
                            <path d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612"/>
                        </svg>
                        </a> 
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mt-5">
                <div class="card border-secondary shadow">
                    <img src="{{ asset('images/random_pp.jpg') }}" class="card-img-top rounded" alt="Discord profile picture of random">
                    <div class="card-body">
                        <h3 class="card-title">random_</h3>
                        <ul>
                            <li>20 ans</li>
                            <li>Discord: random__gg</li>
                        </ul>
                        <h4>Description</h4>
                        <p class="card-text">Salut moi c'est Random, alias "random". À 20 ans, je parle plus couramment JavaScript que Français. Mon passe-temps ? Transformer du café en code et résoudre des bugs qui n'existent pas (selon mon chef). Quand je ne suis pas en train de débattre sur l'éditeur de texte suprême, vous pouvez me trouver en train de prêcher les mérites de l'indentation avec des espaces plutôt qu'avec des tabulations. Hugo, hacker par passion, insomnie par profession.</p>
                        <a href="https://www.discordapp.com/users/392288332262014976">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#7289da" class="bi bi-discord" viewBox="0 0 16 16">
                            <path d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612"/>
                            </svg>
                        </a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection