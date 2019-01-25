<?php
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
?>

@extends('layouts.main')
@section('title', 'Units')
@section('content')
<section class="units container grid-lg pad">
	<div class="columns">
		<div class="column col-8 col-md-12 hide-sm">
			<iframe src="https://www.google.com/maps/d/embed?mid=1riftuTRxvy14w2F-BYw9wl8fXRnpFncc"></iframe>
		</div>

		<div class="column col-4 col-md-12">
			<div class="columns">
				@foreach($units as $unit)
				<div class="column col-sm-12 col-md-6 col-12">
					<a href="/units/{{ $unit->shortname }}/">
						<div class="card">
							<div class="card-header">
								<div class="card-title">{{ $unit->name }}</div>
								<div class="card-subtitle">{{ $days[$unit->day] }}</div>
							</div>
						</div>
					</a>
				</div>
				@endforeach

				<div class="column col-sm-12 col-md-6 col-12">
					<a href="/units/brabazon/">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Brabazon</div>
								<div class="card-subtitle">Thursdays</div>
							</div>
						</div>
					</a>
				</div>

				<div class="column col-sm-12 col-md-6 col-12">
					<a href="/units/brabazon/">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Concorde</div>
								<div class="card-subtitle">Tuesdays</div>
							</div>
						</div>
					</a>
				</div>

				<div class="column col-sm-12 col-md-6 col-12">
					<a href="/units/brabazon/">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Pirates</div>
								<div class="card-subtitle">Wednesdays</div>
							</div>
						</div>
					</a>
				</div>

				<div class="column col-sm-12 col-md-6 col-12">
					<a href="/units/brabazon/">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Spaniorum</div>
								<div class="card-subtitle">Mondays</div>
							</div>
						</div>
					</a>
				</div>

				<div class="column col-sm-12 col-md-6 col-12">
					<a href="/units/brabazon/">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Spitfire</div>
								<div class="card-subtitle">Fridays</div>
							</div>
						</div>
					</a>
				</div>

				<div class="column col-sm-12 col-md-6 col-12">
					<a href="/units/brabazon/">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Steama</div>
								<div class="card-subtitle">Wednesdays</div>
							</div>
						</div>
					</a>
				</div>

				<div class="column col-sm-12 col-md-6 col-12">
					<a href="/units/brabazon/">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Young Leaders</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
