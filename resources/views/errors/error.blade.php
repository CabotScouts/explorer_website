@extends('layouts.main')
@section('content')
<section class="container container-fluid content-center">
	<div class="row justify-content-md-center">
		<div class="col col-12 col-lg-6 text-center">
			<h1>@yield('error')</h1>
			<p>@yield('message')</p>
			@yield('html')
		</div>
	</div>
</section>
@endsection
