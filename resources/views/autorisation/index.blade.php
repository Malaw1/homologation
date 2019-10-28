@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Autorisation de Mise sur le Marche
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Numero</th>
                                    <th>Produit</th>
                                    <th>Classe Therapeutique</th>
                                    <th>Date de l'AMM</th>
                                    <th>Date d'expiration</th>
                                    <th>Laboratoire detenteur</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Numero</th>
                                    <th>Produit</th>
                                    <th>Classe Therapeutique</th>
                                    <th>Date de l'AMM</th>
                                    <th>Date d'expiration</th>
                                    <th>Laboratoire detenteur</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($amm as $demande)
                                    <tr>
                                        <td></td>
                                        <td>{{ $demande->numero }}</td>
                                        <td>{{ $demande->nom_medicament }}</td>
                                        <td>{{ $demande->classe_therapeutique }}</td>
                                        <td>{{ $demande->created_at }}</td>
                                        <td>{{ $demande->expiration }}</td>
                                        @if($demande->role != 'labo')
                                            <td>{{ $demande->labo }}</td>
                                        @else
                                            <td>-----------</td>
                                        @endif
                                        <td>
                                            <a href="{{ url('/autorisation/' . $demande->id) }}"
                                            title="View Client">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> Voire
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
