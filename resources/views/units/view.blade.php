@extends('layouts.main')
@section('title', $unit->name)
@section('content')
@if(($unit->day > -1) && $unit->lat)
<section class="wide-map single-marker">
	<div id="map"></div>
	<div class="map-overlay">
		<div class="map-title">
			<div class="container pad">
				<div class="row">
					<div class="col col-7 col-md-10">
						<h1>{{ $unit->name }}</h1>
					</div>
					<div class="col col-5 col-md-2 actions">
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
@endif
<section class="page pad space">
	<div class="container">
		<div class="row">
			<div class="page-content col col-12 col-lg-9">
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
