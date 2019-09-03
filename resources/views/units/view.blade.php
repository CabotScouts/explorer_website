@extends('layouts.main')
@section('title', $unit->name)
@section('content')
@if($unit->hasMap)
<section class="wide-map single-marker">
	<div id="map"></div>
	<div class="map-overlay">
		<div class="map-title pad">
			<div class="container">
				<div class="row">
					<div class="col col-12 col-md-6 col-lg-8">
						<h1>{{ $unit->name }}</h1>
					</div>
					<div class="actions col col-md-6 col-lg-4 d-none d-md-block">
						<a href="{{ route('units') }}" class="btn btn-success">See all Units</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	function initMap() {
		var unitmap = new google.maps.Map(
			document.getElementById('map'), {
				zoom: 15,
				center: { lat: {{ $unit->lat }}, lng: {{ $unit->lng }} },
				disableDefaultUI : true,
				gestureHandling : 'cooperative',
			});

		var marker = new google.maps.Marker({
			position : { lat : {{ $unit->lat }}, lng : {{ $unit->lng }} },
			map : unitmap
		});
	}
	</script>
</section>
@else
@include('component.breadcrumb', ['segments' => $unit->breadcrumb])
@endif
<section class="page units pad space">
	<div class="container">
		<div class="row">
			<div class="page-content col col-12 col-lg-9">
			@if(!$unit->hasMap)
				<h1>{{ $unit->name }}</h1>
			@endif
			@if($page)
				{!! $page->body !!}
			@endif
			</div>

			<div class="page-sidebar col col-12 col-lg-3">
				<div class="row">
					<div class="block col col-12 col-md-4 col-lg-12">
						@include('component.unit.event-card', ['unit' => $unit])
					</div>

				@if($page)
					{!! $page->formattedSidebar !!}
				@endif
				</div>
			</div>
		</div>
	</div>
</section>

<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap"></script>
@endsection
