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
		<script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('content.gtag') }}"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', '{{ setting("content.gtag") }}');
		</script>
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
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
		@stack('additional-foot')
	</body>
</html>
