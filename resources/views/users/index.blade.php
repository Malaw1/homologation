@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Gestion des utilisateurs</h4>
            <div class="pull-right text-right">
                <a href="{{ url('users/create') }}" class="btn btn-sm btn-primary">
                    <i  class="ion-plus-circled">Ajouter</i>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Prenom & Nom</th>
                    <th>Status</th>
                    <th>Poste</th>
                    <th>Telephone</th>
                    <th>Email</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td></td>
                        <td>{{ $user->titre }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->poste }}</td>
                        <td>{{ $user->telephone }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>

    </div>
    </div>
@endsection
