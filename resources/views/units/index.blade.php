@extends('layouts.main')
@section('title', 'Units')
@section('content')
<section class="wide-map">
	<div id="map"></div>
	<div class="map-overlay">
		<div class="map-title">
			<div class="container pad">
				<div class="row">
					<div class="col col-12 col-md-6 col-lg-8">
						<h1>Explorer Units</h1>
					</div>
					<div class="actions col col-md-6 col-lg-4 d-none d-md-block">
						{{-- <a href="#" class="btn btn-info">District Explorer Team</a> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	var unitmap = [];

	var markers = [
@if(count($units) > 0)
@foreach($units as $unit)
@if(($unit->day > -1) && $unit->lat)
		{
			name : "{{ $unit->name }}",
			day  : "{{ $unit->dayString }}s",
			lat  : {{ $unit->lat }},
			lng  : {{ $unit->lng }},
			url  : "{{ route('view-unit', ['name' => $unit->shortname ]) }}"
		},
@endif
@endforeach
@endif
	];

	function addMarker(m) {
		markers[m].label = new google.maps.InfoWindow({
			content : `<a href="${ markers[m].url }"><strong>${ markers[m].name }</strong></a><br /><small>${ markers[m].day }</small>`
		});

		markers[m].marker = new google.maps.Marker({
			position : { lat : markers[m].lat, lng : markers[m].lng },
			map : unitmap,
			animation: google.maps.Animation.DROP
		});

		markers[m].marker.addListener('click', function() {
			for(i = 0; i < markers.length; i++) {
				markers[i].label.close();
			}
			markers[m].label.open(unitmap, markers[m].marker);
		});
	}

	function initMap() {
		unitmap = new google.maps.Map(
			document.getElementById('map'), {
				zoom: 12,
				center: { lat: {{ env('GOOGLE_MAPS_DEFAULT_CENTER_LAT') }}, lng: {{ env('GOOGLE_MAPS_DEFAULT_CENTER_LNG') }} },
				disableDefaultUI : true,
				gestureHandling : 'cooperative',
			});

		unitmap.addListener('click', function() {
			for(i = 0; i < markers.length; i++) {
				markers[i].label.close();
			}
		});

		for(var i = 0; i < markers.length; i++) {
			var add = function(x) {
				return function() {
					addMarker(x);
				}
			}
			setTimeout(add(i), i * 100);
		}
	}
	</script>
</section>
<section class="page units container pad space">
	<div class="row">
		<div class="page-content col col-12">
				@if(isset($page))
						{!! $page->body !!}
				@endif
		</div>

		<div class="units-list col col-12">
			<div class="row">
				@if(count($units) > 0)
					@foreach($units as $unit)
					<div class="col col-12 col-md-6 col-lg-3">
						@include('component.unit.card', ['unit' => $unit])
					</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</section>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap"></script>
@endsection
