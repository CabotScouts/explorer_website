<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		@if(isset($page))
			@include('component.opengraph', ['page' => $page])
		@endif
		<link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}"/>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('css/icons.css') }}">
		<script src="{{ asset('js/app.js') }}"></script>
		@hasSection('title')
		<title>@yield('title') - {{ config('app.name') }}</title>
		@else
		<title>{{ config('app.name') }}</title>
		@endif
		@stack('additional-head')
	</head>

	<body>
		<header>
			@include('component.ribbon')
			@include('component.navbar', [
				'page'  => (isset($page)  ? $page  : false),
				'unit'  => (isset($unit)  ? $unit  : false),
				'units' => (isset($units) ? $units : false)
			])
		</header>

		<main>
			@yield('content')
		</main>

	  <footer>
		@include('component.footer')
	  </footer>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		@stack('additional-foot')
	</body>
</html>
