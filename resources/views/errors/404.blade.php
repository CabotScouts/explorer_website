@extends('layouts.main')
@section('title', '404')
@section('content')
<section class="container grid-lg pad">
	<div class="columns">
		<div class="empty col-lg-6 col-md-12 col-mx-auto">
			<div class="empty-icon"><i class="icon icon-location icon-3x"></i></div>
			<p class="empty-title h1">404 - Page Not Found</p>
			<p class="empty-subtitle">The page you were looking for could not be found.</p>
				<form class="empty-action input-group input-inline" method="post" action="/search/">
					@csrf
					<input class="form-input" name="search" type="text" placeholder="">
	        <button class="btn btn-primary input-group-btn">Search</button>
				</form>
		</div>
	</div>
</section>
@endsection
