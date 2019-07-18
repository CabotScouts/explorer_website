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
		<link rel="stylesheet" href="{{ asset('assets/main.css') }}">
		@hasSection('title')
		<title>@yield('title') - Cabot Explorer Scouts</title>
		@else
		<title>Cabot Explorer Scouts</title>
		@endif

		<script src="https://cdnjs.cloudflare.com/ajax/libs/cash/3.1.0/cash.min.js"></script>
		<script type="text/javascript">
			$('body').ready(function() {
				$('#menu').addClass('hidden');
				$('#nav-toggle').on('click', function() {
					$('#menu').toggleClass('hidden');
				});
			});
		</script>
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
	</body>
</html>
