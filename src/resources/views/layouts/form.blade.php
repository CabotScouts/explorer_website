<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}"/>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		@hasSection('title')
		<title>@yield('title') - {{ config('app.name') }}</title>
		@else
		<title>{{ config('app.name') }}</title>
		@endif
		@yield('additional-head')
	</head>

	<body>
		<main class="formview">
			<div class="container">
				<div class="row justify-content-md-center align-items-center">
					<div class="col col-12 col-lg-8">
						
						<div class="row mt-4 mb-4">
							<div class="col-6 col-md-4 col-lg-3 mx-auto">
								<img src="{{ asset('img/logo-stacked.png') }}" class="img-fluid" />
							</div>
							<div class="col-12 text-center mt-2">
								<h2>{{ config('app.name') }}</h2>
							</div>
						</div>
						
						@yield('content')
						
						<div class="row">
							<div class="col-12 text-center mt-4">
								<p><small>&copy; {{ config('app.name') }} {{ today()->year }}</small></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
	</body>
</html>
