@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Guerre Actuelle</h1>
    <p>Date: {{ $currentWar->date }}</p>
    <!-- Vous pouvez ajouter plus de détails ici selon les données disponibles -->
</div>
@endsection
