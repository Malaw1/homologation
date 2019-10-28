<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Homologation') }}</title>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css"/>
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.min.css"/>
    <link rel="stylesheet" href="{{ asset('dist/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/modules/summernote/summernote-lite.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/flag-icon-css/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


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
                    <a href="{{ url('autorisation') }}"><i class="ion ion-ios-location-outline"></i><span>Autorisations</span></a>
                </li>
                <li>
                    <a href="{{url('events')}}"><i class="ion ion-ios-location-outline"></i><span>Calendrier</span></a>
                </li>
            @elseif(Auth()->check() && Auth()->user()->role == 'labo')
                <li class="menu-header">Homologation</li>

                <li>
                    <a href="{{url('request')}}"><i class="ion ion-clipboard"></i><span>Enregistrement</span></a>
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
                <li>
                    <a href="{{ url('events') }}"><i class="ion ion-ios-location-outline"></i><span>Calendrier</span></a>
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
                    <a href="{{ url('commission') }}"><i class="ion ion-ios-location-outline"></i><span>Commission</span></a>
                </li>
                <li>
                    <a href="{{url('events')}}"><i class="ion ion-ios-location-outline"></i><span>Calendrier</span></a>
                </li>

            @endif


        </aside>
      </div>
      <div class="main-content">
        @include('flash-messages')

        @yield('content')
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
  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
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
  <script src="{{ asset('dist/js/fullcalendar-init.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script>
            @yield('pageScript')
        </script>



   <!-- Ajout et Retrait pour le Les substances Actives -->
<script>
    function checkRemove() {
        if ($('div.react').length == 1) {
            $('#remove').hide();
        } else {
            $('#remove').show();
        }
    };
    $(document).ready(function() {
        checkRemove()
        $('#add').click(function() {
            $('div.react:last').after($('div.react:first').clone());
            checkRemove();
        });
        $('#remove').click(function() {
            $('div.react:last').remove();
            checkRemove();
        });
    });
</script>
</body>
</html>
