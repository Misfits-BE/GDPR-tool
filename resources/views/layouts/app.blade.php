<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - GDPR</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body class="bg-light">
    <div id="app">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand mr-auto mr-lg-0" href="#">{{ config('app.name') }} - GDPR</a>
                <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-fw fa-user"></i> {{ $currentUser->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="{{ route('profile.settings') }}" class="dropdown-item">
                                    <i class="fas fa-fw fa-user-cog"></i> Account settings
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-fw fas fa-power-off text-danger"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf {{-- Form field protection --}}
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="nav-scroller bg-white box-shadow">
            <div class="container">
                <nav class="nav nav-underline">
                    <a class="nav-link pl-0 active" href="{{ route('home') }}">Dashboard</a>

                    <a class="nav-link" href="">
                        Concerns <span class="badge badge-pill badge-danger align-text-bottom">27</span>
                    </a>

                    <a class="nav-link" href="{{ route('users.index') }}">
                        Users <span class="badge badge-pill badge-danger align-text-bottom">27</span>
                    </a>

                    <a class="nav-link" href="#">Domains</a>

                    @if ($currentUser->hasRole('admin'))
                        <a class="nav-link" href="">Logs</a>
                        <a class="nav-link" href="">API Documentation</a>
                    @endif
                </nav>
            </div>
        </div>

        <main role="main" class="container">
            @yield('content')
        </main>
    </div>

    {!! Toastr::message() !!} {{-- Notification partial --}}
</body>
</html>
