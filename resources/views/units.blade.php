@extends('layouts.main')
@section('title', 'Units')
@section('content')
<section class="wide-map">
	<div id="map"></div>
	<script>
	var unitmap = [];

	var markers = [
@if(count($units) > 0)
@foreach($units as $unit)
@if(($unit->day > -1) && $unit->lat)
		{
			name : "{{ $unit->name }}",
			day : "{{ $unit->dayString }}s",
			lat : {{ $unit->lat }},
			lng : {{ $unit->lng }}
		},
@endif
@endforeach
@endif
	];

	function addMarker(m) {
		markers[m].label = new google.maps.InfoWindow({
			content : `<b>${ markers[m].name }</b><br /><small>${ markers[m].day }</small>`
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
				// zoomControl : false
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
			setTimeout(add(i), i * 200);
		}
	}
	</script>
	{{-- <div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col col-12">
					<h1>Cabot Explorer Units</h1>
				</div>
			</div>
		</div>
	</div> --}}
</section>
<section class="page units container pad space">
	<div class="row">
		<div class="col col-12">
			@if(isset($page))
				{!! $page->body !!}
			@endif
		</div>

		<div class="units-list col col-12">
			<div class="row">
				@if(count($units) > 0)
					@foreach($units as $unit)
					<div class="col col-6 col-md-3">
						@if($unit->url)
						<a href="{{ $unit->url }}/">
						@endif
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">{{ $unit->name }}</h5>
									@if($unit->day > -1)
									<h6 class="card-subtitle muted">{{ $unit->dayString }}</h6>
									@endif
								</div>
							</div>
						@if($unit->url)
						</a>
						@endif
					</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</section>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap"></script>
@endsection
