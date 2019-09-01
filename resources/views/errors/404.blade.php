@extends('layouts.main')
@section('title', '404')
@section('content')
<section class="container container-fluid pad">
	<div class="row justify-content-md-center">
		<div class="col col-12 col-lg-6 text-center">
			<h1>404 - Page Not Found</h1>
			<p>The page you were looking for could not be found.</p>
			<form class="empty-action input-group input-inline" method="post" action="/search/">
				@csrf
				<input class="form-input" name="search" type="text" placeholder="">
	       <button class="btn btn-primary input-group-btn">Search</button>
			</form>
		</div>
	</div>
</section>
@endsection
