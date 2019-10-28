@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-5">Recevabilite Admistrative</h1>
        <p class="lead">Demande: {{ $demande->code }} </p>
        <br>
        <strong>{{ $demande->nom_medicament }} {{ $demande->forme_pharmaceutique }} </strong> du laboratoire <I>{{ $demande->labo }}</I></p>
        <hr class="my-4">


        @if($demande->status != 'Acceptée')
            <div class="alert alert-warning">
                Status: <strong>{{ $demande->status}}</strong>
            </div>
        @else
            <div class="alert alert-success">
                Status: <strong>{{ $demande->status}}</strong>
            </div>
        @endif
        <p class="lead">
        </p>
    </div>
</div>

@endsection
