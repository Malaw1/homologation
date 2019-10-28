<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Homologation') }}</title>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">

  <link rel="stylesheet" href="{{ asset('dist/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/modules/summernote/summernote-lite.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/flag-icon-css/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="ion ion-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn" type="submit"><i class="ion ion-search"></i></button>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">

          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
            <i class="ion ion-android-person d-lg-none"></i>
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="profile.html" class="dropdown-item has-icon">
                <i class="ion ion-android-person"></i> Profile
              </a>
                <a class="dropdown-item has-icon" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="ion ion-log-out"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ url('home') }}">Homologation</a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-picture">
              <img alt="image" src="{{ asset('img/avatar-user.png') }}">
            </div>
            <div class="sidebar-user-details">
              <div class="user-name">{{ Auth::user()->name }}</div>
              <div class="user-role">
              {{ Auth::user()->role }}
              </div>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
              <a href="{{ url('home') }}"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
            </li>
            @if(Auth()->check() && Auth()->user()->role == 'agence')
                <li class="menu-header">Homologation</li>

                <li>
                    <a href="{{url('request/create')}}"><i class="ion ion-clipboard"></i><span>Enregistrement</span></a>
                </li>
                <li>
                    <a href="#"><i class="ion ion-stats-bars"></i><span>Variation</span></a>
                </li>
                <li>
                    <a href="#"><i class="ion ion-ios-location-outline"></i><span>Renouvellement</span></a>
                </li>
                <li>
                    <a href="#"><i class="ion ion-ios-location-outline"></i><span>Visa Publicitaire</span></a>
                </li>

                <li class="menu-header">Perso</li>
                <li>
                    <a href="{{ url('laboratoire')}}"><i class="ion ion-ios-location-outline"></i><span>Labo Representés</span></a>
                </li>
                <li>
                    <a href="{{ url('demande') }}"><i class="ion ion-ios-location-outline"></i><span>Demandes</span></a>
                </li>
                <li>
                    <a href="#"><i class="ion ion-ios-location-outline"></i><span>Autorisations</span></a>
                </li>
                <li>
                    <a href="{{url('events')}}"><i class="ion ion-ios-location-outline"></i><span>Calendrier</span></a>
                </li>
            @elseif(Auth()->check() && Auth()->user()->role == 'labo')
                <li class="menu-header">Homologation</li>

                <li>
                    <a href="{{url('request/create')}}"><i class="ion ion-clipboard"></i><span>Enregistrement</span></a>
                </li>
                <li>
                    <a href="#"><i class="ion ion-stats-bars"></i><span>Variation</span></a>
                </li>
                <li>
                    <a href="#"><i class="ion ion-ios-location-outline"></i><span>Renouvellement</span></a>
                </li>
                <li>
                    <a href="#"><i class="ion ion-ios-location-outline"></i><span>Visa Publicitaire</span></a>
                </li>

                <li class="menu-header">Perso</li>
                <li>
                    <a href="{{ url('demande') }}"><i class="ion ion-ios-location-outline"></i><span>Demandes</span></a>
                </li>
                <li>
                    <a href="{{ url('autorisation') }}"><i class="ion ion-ios-location-outline"></i><span>Autorisations</span></a>
                </li>
                <li>
                    <a href="{{url('events')}}"><i class="ion ion-ios-location-outline"></i><span>Calendrier</span></a>
                </li>
            @elseif(Auth()->check() && Auth()->user()->role == 'pharmacien')
                <li>
                    <a href="{{ url('demande') }}"><i class="ion ion-ios-location-outline"></i><span>Demandes</span></a>
                </li>
                <li>
                    <a href="{{ url('autorisations') }}"><i class="ion ion-ios-location-outline"></i><span>Autorisations</span></a>
                </li>
                <li>
                    <a href="{{ url('evaluations') }}"><i class="ion ion-ios-location-outline"></i><span>Evaluations</span></a>
                </li>
                <li>
                    <a href="{{ url('recevabilites') }}"><i class="ion ion-ios-location-outline"></i><span>Recevabilites</span></a>
                </li>
            @else

                <li>
                    <a href="{{ url('demande') }}"><i class="ion ion-ios-location-outline"></i><span>Demandes</span></a>
                </li>
                <li>
                    <a href="{{ url('autorisation') }}"><i class="ion ion-ios-location-outline"></i><span>Autorisations</span></a>
                </li>
                <li>
                    <a href="{{ url('agence') }}"><i class="ion ion-ios-location-outline"></i><span>Agences</span></a>
                </li>
                <li>
                    <a href="{{ url('laboratoire') }}"><i class="ion ion-ios-location-outline"></i><span>Laboratoires</span></a>
                </li>
                <li>
                    <a href="{{ url('produits') }}"><i class="ion ion-ios-location-outline"></i><span>Produits</span></a>
                </li>
                <li>
                    <a href="{{ url('commission') }}"><i class="ion ion-ios-location-outline"></i><span>Commission</span></a>
                </li>
                <li>
                    <a href="{{url('events')}}"><i class="ion ion-ios-location-outline"></i><span>Calendrier</span></a>
                </li>
                <li>
                    <a href="{{url('users')}}"><i class="ion ion-ios-location-outline"></i><span>Utilisateurs</span></a>
                </li>

            @endif


        </aside>
      </div>
      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Dashboard</div>
          </h1>

        @if(Auth()->check() && Auth()->user()->role == 'agence')
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-sm-3">
                    <div class="card-icon bg-primary">
                    <i class="ion ion-person"></i>
                    </div>
                    <div class="card-wrap">
                    <div class="card-header">
                        <h4>Labo Representés</h4>
                    </div>
                    <div class="card-body">
                        {{ $lab }}
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-sm-3">
                    <div class="card-icon bg-danger">
                    <i class="ion ion-ios-paper-outline"></i>
                    </div>
                    <div class="card-wrap">
                    <div class="card-header">
                        <h4>Demandes</h4>
                    </div>
                    <div class="card-body">
                        {{ $dem}}
                    </div>
                    </div>
                </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-sm-3">
                    <div class="card-icon bg-success">
                    <i class="ion ion-record"></i>
                    </div>
                    <div class="card-wrap">
                    <div class="card-header">
                        <h4>Autorisations</h4>
                    </div>
                    <div class="card-body">
                        {{ $auto}}
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Demandes</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Code</th>
                                            <th>Nom Commercial</th>
                                            <th>Forme Pharmaceutique</th>
                                            <th>Conditionnement</th>
                                            <th>Labo Demandeur</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        <tbody>
                                            @foreach($demande as $demande)
                                            <tr>
                                                <td width="40">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                        <label for="checkbox-1" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $demande->type }}</td>
                                                <td>{{ $demande->code }}</td>
                                                <td>{{ $demande->nom_medicament }}</td>
                                                <td>{{ $demande->forme_pharmaceutique }}</td>
                                                <td>{{ $demande->presentation }}</td>
                                                <td>{{ $demande->labo }}</td>
                                                @if($demande->status == 'Acceptée')
                                                    <td><div class="badge badge-success">{{ $demande->status }}</div></td>
                                                @else
                                                    <td><div class="badge badge-warning">{{ $demande->status }}</div></td>
                                                @endif
                                                <td>
                                                    <a href="{{ url('/demande/' . $demande->id) }}" class="btn btn-action btn-secondary">Detail</a>
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
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">

                    </div>
                </div>
            </div>
        @elseif(Auth()->check() && Auth()->user()->role == 'labo')
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card card-sm-3">
                    <div class="card-icon bg-danger">
                        <i class="ion ion-ios-paper-outline"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Demande en cours</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <div class="card card-sm-3">
                    <div class="card-icon bg-success">
                        <i class="ion ion-record"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Autorisations</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Demandes</h4>
                    </div>
                    <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Code</th>
                                            <th>Nom Commercial</th>
                                            <th>Forme Pharmaceutique</th>
                                            <th>Conditionnement</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        <tbody>
                                            @foreach($demande as $demande)
                                            <tr>
                                                <td width="40">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                        <label for="checkbox-1" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $demande->type }}</td>
                                                <td>{{ $demande->code }}</td>
                                                <td>{{ $demande->nom_medicament }}</td>
                                                <td>{{ $demande->forme_pharmaceutique }}</td>
                                                <td>{{ $demande->presentation }}</td>
                                                @if($demande->status == 'Acceptée')
                                                    <td><div class="badge badge-success">{{ $demande->status }}</div></td>
                                                @else
                                                    <td><div class="badge badge-warning">{{ $demande->status }}</div></td>
                                                @endif
                                                <td>
                                                    <a href="{{ url('/demande/' . $demande->id) }}" class="btn btn-action btn-secondary">Detail</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="ion ion-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="ion ion-chevron-right"></i></a>
                        </li>
                        </ul>
                    </nav>
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">

                </div>
                </div>
            </div>

        @else

          <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-primary">
                  <i class="ion ion-person"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Laboratoires</h4>
                  </div>
                  <div class="card-body">
                    {{ $toLab }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-danger">
                  <i class="ion ion-ios-paper-outline"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Demandes</h4>
                  </div>
                  <div class="card-body">
                    {{$toDem}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-warning">
                  <i class="ion ion-paper-airplane"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Agences</h4>
                  </div>
                  <div class="card-body">
                    {{ $agences }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-success">
                  <i class="ion ion-record"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Autorisations</h4>
                  </div>
                  <div class="card-body">
                    {{ $autorised }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                            <div class="card-header">
                                <h4>Simple Table</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Code</th>
                                            <th>Nom Commercial</th>
                                            <th>Forme Pharmaceutique</th>
                                            <th>Conditionnement</th>
                                            <th>Labo Demandeur</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        <tbody>
                                            @foreach($totalDemande as $demande)
                                            <tr>
                                                <td width="40">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                        <label for="checkbox-1" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $demande->type }}</td>
                                                <td>{{ $demande->code }}</td>
                                                <td>{{ $demande->nom_medicament }}</td>
                                                <td>{{ $demande->forme_pharmaceutique }}</td>
                                                <td>{{ $demande->presentation }}</td>
                                                <td>{{ $demande->labo }}</td>
                                                @if($demande->status == 'Acceptée')
                                                    <td><div class="badge badge-success">{{ $demande->status }}</div></td>
                                                @else
                                                    <td><div class="badge badge-warning">{{ $demande->status }}</div></td>
                                                @endif
                                                <td>
                                                    <a href="{{ url('/demande/' . $demande->id) }}" class="btn btn-action btn-secondary">Detail</a>
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
        @endif
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://multinity.com/">Multinity</a>
        </div>
        <div class="footer-right"></div>
      </footer>
    </div>
  </div>

  <script src="{{ asset('dist/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('dist/modules/popper.js') }}"></script>
  <script src="{{ asset('dist/modules/tooltip.js') }}"></script>
  <script src="{{ asset('dist/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('dist/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
  <script src="{{ asset('dist/js/sa-functions.js') }}"></script>

  <script src="{{ asset('dist/modules/chart.min.js') }}"></script>
  <script src="{{ asset('dist/modules/summernote/summernote-lite.js') }}"></script>

  <script src="{{ asset('dist/js/scripts.js') }}"></script>
  <script src="{{ asset('dist/js/custom.js') }}"></script>
  <script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>
