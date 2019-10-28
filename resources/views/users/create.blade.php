@extends('layouts.layout')


@section('content')
    <div class="card-body">
        <div class="active" id="lg-simple" data-tab-group="list-group">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <label for="telephone">Titre</label>
                        <select name="titre" class="form-control" id="titre">
                            <option value="Pr.">Pr.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="M.">M.</option>
                            <option value="Mme.">Mme.</option>
                            <option value="Mlle.">Mlle.</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="frist_name">Prenom et Nom</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="role" class="d-block">Fonction</label>
                        <input id="role" type="text" class="form-control" name="role">
                    </div>
                    <div class="form-group col-6">
                        <label for="poste" class="d-block">Poste occupée</label>
                        <input id="poste" type="text" class="form-control" name="poste">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-4">
                        <label for="telephone">Numero de telephone</label>
                        <input id="phone" type="text" class="form-control" name="telephone" placeholder="Phone Number">
                    </div>
                    <div class="form-group col-4">
                        <label for="email" class="d-block">Email</label>
                        <input id="email" type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group col-4">
                        <label for="adresse" class="d-block">Adresse</label>
                        <input type="text" class="form-control" name="adresse" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group col-6">
                        <label for="password2" class="d-block">Password Confirmation</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <input type="hidden" name="pays" value="SN">
                <input type="hidden" name="region" value="DK">

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                    Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
