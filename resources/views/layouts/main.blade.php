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
		@hasSection('title')
		<title>@yield('title') - Cabot Explorer Scouts</title>
		@else
		<title>Cabot Explorer Scouts</title>
		@endif
	</head>

	<body>
		<header>
			@include('component.ribbon')
			@include('component.navbar', ['page' => (isset($page) ? $page : false)])
		</header>

		<main>
			@yield('content')
		</main>

	  <footer>
			@include('component.footer')
	  </footer>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>
