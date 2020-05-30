<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- Add to Home Screen --}}
    <meta name='mobile-web-app-capable' content='yes'>
    <meta name='apple-mobile-web-app-capable' content='yes'>
    
    {{-- Theme Color --}}
    <meta name="theme-color" content="#203A70">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	{{-- CSRF Token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	{{-- Scripts --}}
	<script src="{{ asset('js/app.js') }}"></script>
    <script data-ad-client="ca-pub-3991369516122121" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> 
	@stack('header-scripts')
	
	{{-- Icon --}}
    <link rel='icon' type='image/png' href='{{ asset('favicon512.png') }}'>
    
    {{-- Manifest --}}
    <link rel="manifest" href="{{ asset('manifest.json') }}">

   	<link rel="dns-prefetch" href="//fonts.gstatic.com">

    {{-- Styles --}}
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@stack('styles')
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{ url('/') }}">
					<i class="fa fa-books fa-lg"></i> {{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					{{-- Left Side Of Navbar --}}
					<ul class="navbar-nav mr-auto">
						<li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('home') }}">
								<i class="fa fa-home-alt"></i>
								@lang('home.home')
							</a> 
						</li>
						<li class="nav-item dropdown {{ request()->is('especialidad/*') ? 'active' : '' }}">
							<a class="nav-link dropdown-toggle" href="#" id="navbarSpecialties" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <i class="fad fa-graduation-cap"></i>
								@lang('home.especiality')
							</a>
							{{-- Dropdown items --}}
							<div class="dropdown-menu bg-primary" aria-labelledby="navbarSpecialties">
								@php $especialidades = DB::table('categories')->select()->where('saveIn', 'LIKE', 'ESPECIALIDAD')->orderBy('name', 'ASC')->get() @endphp
								@foreach($especialidades as $especialidad)
								<a class="dropdown-item {{ request()->is('especialidad/' . $especialidad->slug) ? 'active' : '' }}" href="{{ route('especialidad', $especialidad->slug) }}">
									{{ $especialidad->name }}
								</a>
								@endforeach
							</div>
						</li>
						<li class="nav-item dropdown {{ request()->is('asignaturas/*') ? 'active' : '' }}">
							<a href="#" class="nav-link dropdown-toggle" id="navbarSubject" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fad fa-backpack"></i>
								@lang('home.subjects')
							</a>
							{{-- Dropdown items --}}
							<div class="dropdown-menu bg-primary" aria-labelledby="navbarSubject">
								@php $asignaturas = DB::table('categories')->select()->where('saveIn', 'ASIGNATURA')->orderBy('name', 'ASC')->get() @endphp
								@foreach($asignaturas as $asignatura)
								<a class="dropdown-item {{ request()->is('asignaturas/' . $asignatura->slug) ? 'active' : '' }}" href="{{ route('asignaturas', $asignatura->slug) }}">
									{{ $asignatura->name }}
								</a>
								@endforeach
							</div>
						</li>
						<li class="nav-item dropdown {{ request()->is('otros/*') ? 'active' : '' }}">
							<a class="nav-link dropdown-toggle" href="#" id="navbarOthers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-campground fa-sm"></i>
								@lang('home.others')
							</a>
							{{-- Dropdown items --}}
							<div class="dropdown-menu bg-primary" aria-labelledby="navbarOthers">
								@php $otras = DB::table('categories')->select()->where('saveIn', 'OTRAS')->orderBy('name', 'ASC')->get() @endphp
								@foreach($otras as $otra)
								<a class="dropdown-item {{ request()->is('otros/' . $otra->slug) ? 'active' : '' }}" href="{{ route('otros', $otra->slug) }}">
									{{ $otra->name }}
								</a>
								@endforeach
							</div>
						</li>
					</ul>

					{{-- Right Side Of Navbar --}}
					<ul class="navbar-nav ml-auto">
						{{-- Authentication Links --}}
						@guest
							<li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
								<a class="nav-link" href="{{ route('login') }}">
									@lang('home.admin')
									<i class="fa fa-user-lock"></i>
								</a>
							</li>
							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
							@endif
						@else
							<li class="nav-item {{ request()->is('categories*') ? 'active' : '' }}">
								<a class="nav-link" href="{{ route('categories.index') }}">
									<i class="fa fa-tags fa-sm"></i>
									@lang('home.categories')
								</a>
							</li>
							<li class="nav-item {{ request()->is('books*') ? 'active' : '' }}">
								<a class="nav-link" href="{{ route('books.index') }}">
									<i class="fa fa-book fa-sm"></i>
									@lang('home.books')
								</a>
							</li>
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									<i class="fa fa-md fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right bg-primary text-white" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}"
									   onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
										@lang('home.logout').
										<i class="fa fa-sign-out-alt"></i>
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		<main class="py-1 mt-1">
			{{-- Book's search --}}
			<div class="input-group mb-3 mt-lg-3 mx-auto pb-lg-5">
				<input type="text" class="form-control" placeholder="@lang('home.search')..." aria-label="Book Search" aria-describedby="basic-addon2" id="inputSearch" name="name" autocomplete="off">
				<div class="input-group-append">
					<button id="buttonSearch" class="btn btn-secondary">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
			@if(session('info'))
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="alert alert-success d-flex justify-content-between align-items-center">
                        {{ session('info') }} <i class="fa fa-check"></i>
                    </div>
                </div>
            </div>
            @endif
            @if(count($errors))
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="alert alert-danger">
                    	<div class="d-flex justify-content-between align-items-center">
                    		@lang('web.error') <i class="fa fa-bomb"></i>
                    	</div>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
			@yield('content')
		</main>
	</div>
	{{-- Footer --}}
    <footer class="py-2 bg-dark">
        <div class="container">
          	<p class="m-0 text-center text-white">
	          	<span>Secretaria de Educaci&oacute;n P&uacute;blica</span><br>
	            <span>Unidad de Educaci&oacute;n Media Superior</span><br>
	            <span>CENTRO DE BACHILLERATO TECN&Oacute;LOGICO INDUSTRIAL Y DE SERVICIOS #128</span><br>
	            <span>Benito Ju&aacute;rez Garc&iacute;a</span>
        	</p>
        	<p class="text-center text-white"><a href="{{ url('lang', ['es']) }}">Espa&ntilde;ol</a> | <a href="{{ url('lang', ['en']) }}">English</a> | <a href="{{ url('lang', ['fr']) }}">Français</a> | <a href="{{ url('lang', ['it']) }}">Italiano</a> | <a href="{{ url('lang', ['de']) }}">Deutsch</a> | <a href="{{ url('lang', ['ru']) }}">Pусский</a></p>
        </div>
        {{-- /.container --}}
    </footer>
    <script type="text/javascript">
    	$(function(){$("#inputSearch").easyAutocomplete({url:function(e){return"{{ route('books.search') }}?search="+e}, getValue: 'name'}),$("#inputSearch").keypress(function(e){13==(e.keyCode?e.keyCode:e.which)&&$("#buttonSearch").click()}),$("#buttonSearch").on("click",function(){location.href="{{ route('showbooks', '') }}/"+$("#inputSearch").val()})});
    </script>
	@stack('scripts')
	<script src="{{ asset('js/jquery.contact-buttons.js') }}"></script>
</body>
</html>