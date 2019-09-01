@extends('layouts.main')
@section('title', '404')
@section('content')
<section class="container container-fluid content-center">
	<div class="row justify-content-md-center">
		<div class="col col-12 col-lg-6 text-center">
			<h1>404 - Page Not Found</h1>
			<p>The page you were looking for could not be found.</p>
			{{-- <form class="form-inline" method="post" action="/search/">
				@csrf
				<label class="sr-only" for="searchBox">Search for a page</label>
				<input type="text" class="form-control mr-sm-2" name="search" id="searchBox" placeholder="">
	      <button type="submit" class="btn btn-primary">Search</button>
			</form> --}}
		</div>
	</div>
</section>
@endsection
