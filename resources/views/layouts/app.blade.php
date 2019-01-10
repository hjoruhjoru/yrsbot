<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/extend/skel.min.js') }}"></script>
	<script src="{{ asset('js/extend/skel-layers.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/extend/skel.css') }}" rel="stylesheet"/>
	<link href="{{ asset('css/extend/style.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/extend/style-xlarge.css') }}" rel="stylesheet" />
	<title>yrsbot</title>
	
	
    
</head>
<body>
	<header id="header">
		<h1><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></h1>
		<nav id="nav">
			<ul>
				@if (Route::has('login'))
					@auth
						<li><a href="{{ url('/home') }}">Chat Room</a></li>
						<li><a href="{{ url('/response') }}">Dialogue Model</a></li>
						<li><a href="{{ url('/profile') }}">Profile</a></li>
						<li class="dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					@else
						<li><a href="{{ route('login') }}">Login</a></li>
						<li><a href="{{ route('register') }}">Register</a></li>
					@endauth
				@endif
			</ul>
		</nav>
	</header>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
