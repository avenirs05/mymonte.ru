<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="yandex-verification" content="30abed22f0fc9acb" />

		<title>Админпанель — mybudva.ru</title>

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="/images/fav-admin.ico" type="image/png">

		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet preload" as="style">
		
		<!-- Localization -->
		<script src="/js/language/{{ str_replace('_', '-', app()->getLocale()) }}.js" as="script"></script> 
	</head>
	
	<style>
		#logout-form {
			position: absolute;
			z-index: 10000;
			color: antiquewhite;
			top: 24px;
			right: 24px;
			font-family: 'Open Sans'
		}
		#logout-form button:hover {
			color: yellow;
		}
	</style>

	<body>	
		<!-- Ziggy -->
		@routes
		
		<form id="logout-form" action="{{ route('logout') }}" method="POST">
			<button type="submit">Выход</button>
			@csrf
		</form>		
		
		<div id="app">	
			@yield('content')			
		</div>		
		
		<script src="{{ asset('js/admin.js') }}"></script>
	</body>
</html>


