<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>Examples &rsaquo; Register &mdash; Stisla</title>

  <link rel="stylesheet" href="{{ asset('dist/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              Inscription
            </div>

            <div class="card card-primary">
                    <div class="card-header">
                        <div class="float-right">
                            <div class="btn-group">
                                <a href="#lg-simple" data-tab="list-group" class="btn active">Laboratoire</a>
                                <a href="#lg-active" data-tab="list-group" class="btn">Agence</a>
                            </div>
                        </div>
                        <h4>Vous êtes?</h4>
                    </div>
                    <div class="card-body">
                        <div class="active" id="lg-simple" data-tab-group="list-group">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <input id="type" type="hidden" name="role" value="labo">

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="frist_name">Nom du Laboratoire</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="last_name">Numero de telephone</label>
                                        <input id="last_name" type="text" class="form-control" name="telephone" placeholder="Phone Number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email">
                                    <div class="invalid-feedback">
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

                                <div class="form-divider">
                                    Adresse
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Adresse</label>
                                        <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>
                                        @error('adresse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Code Postal</label>
                                        <input id="zip" type="text" placeholder="Postal Code" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required autocomplete="zip" autofocus>
                                        @error('region')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                    <label>Country/Pays</label>
                                    <select class="form-control @error('pays') is-invalid @enderror" name="pays">
                                        <option>Indonesia</option>
                                        <option>Palestine</option>
                                        <option>Syria</option>
                                        <option>Malaysia</option>
                                        <option>Thailand</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Province/Region</label>
                                        <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ old('region') }}" required autocomplete="region" autofocus>
                                        @error('region')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                        <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                    Register
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div id="lg-active" data-tab-group="list-group">
                        <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" value="agence" name="role">
                    <div class="form-divider">
                    Identification de L'agence
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="frist_name">Nom de l'agence</label>
                            <input id="frist_name" type="text" class="form-control" name="name" autofocus placeholder="Agency Name">
                        </div>
                        <div class="form-group col-6">
                            <label for="last_name">Numero de telephone</label>
                            <input id="last_name" type="text" class="form-control" name="telephone" placeholder="Phone Number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email">
                        <div class="invalid-feedback">
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

                    <div class="form-divider">
                        Adresse
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Adresse</label>
                            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>
                            @error('adresse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label>Code Postal</label>
                            <input id="zip" type="text" placeholder="Postal Code" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required autocomplete="zip" autofocus>
                            @error('region')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                        <label>Pays</label>
                        <select class="form-control @error('pays') is-invalid @enderror" name="pays">
                            <option>Indonesia</option>
                            <option>Palestine</option>
                            <option>Syria</option>
                            <option>Malaysia</option>
                            <option>Thailand</option>
                        </select>
                        </div>
                        <div class="form-group col-6">
                            <label>Province/Region</label>
                            <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ old('region') }}" required autocomplete="region" autofocus>
                            @error('region')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-divider">
                        Personne Conctact
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="frist_name">Prenom</label>
                            <input id="first_name" type="text" class="form-control" name="first_name">
                        </div>
                        <div class="form-group col-6">
                            <label for="last_name">Nom</label>
                            <input id="last_name" type="text" class="form-control" name="last_name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="Email">Email</label>
                            <input id="email" type="text" class="form-control" name="mail_user">
                        </div>
                        <div class="form-group col-6">
                            <label for="adress">Numero de Telephone</label>
                            <input id="phone" type="text" class="form-control" name="phone_user">
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                        <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                        S'inscrire
                        </button>
                    </div>
                </form>
                        </div>

                    </div>
              </div>
            <div class="simple-footer">
              Copyright &copy; Direction de la Pharmacie et du Medicament 2019
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="{{ asset('dist/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('dist/modules/popper.js') }}"></script>
  <script src="{{ asset('dist/modules/tooltip.js') }}"></script>
  <script src="{{ asset('dist/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('dist/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('dist/modules/moment.min.js') }}"></script>
  <script src="{{ asset('dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
  <script src="{{ asset('dist/js/sa-functions.js') }}"></script>

  <script src="{{ asset('dist/js/scripts.js') }}"></script>
  <script src="{{ asset('dist/js/custom.js') }}"></script>
  <script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>
