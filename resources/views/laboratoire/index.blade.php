@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Laboratoires</h4>
            <div class="pull-right text-right">
                <a href="{{ url('laboratoire/create') }}" class="btn btn-sm btn-primary">
                    <i  class="ion-plus-circled">Ajouter</i>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Laboratoire</th>
                    <th>Pays</th>
                    <th>Region</th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Email</th>
                </thead>
                <tbody>
                @foreach($labo as $labo)
                    <tr>
                        <td></td>
                        <td>{{ $labo->name }}</td>
                        <td>{{ $labo->pays }}</td>
                        <td>{{ $labo->region }}</td>
                        <td>{{ $labo->adresse }}</td>
                        <td>{{ $labo->telephone }}</td>
                        <td>{{ $labo->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>

    </div>
    </div>
@endsection
