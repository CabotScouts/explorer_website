@extends('layouts.main')
@section('title', $unit->name)
@section('content')
@if(($unit->day > -1) && $unit->lat)
<section class="wide-map">
	<div id="map" class="single-marker"></div>
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
				<div class="page-content col col-12 col-lg-8">
				@if($page)
					{!! $page->body !!}
				@endif
				</div>

				<div class="page-sidebar col col-12 col-lg-4">
					<div class="row">
						<div class="block col col-12 col-md-4 col-lg-12">
							@include('component.unit-card', ['unit' => $unit, 'hideactions' => true])
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
