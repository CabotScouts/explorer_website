@extends('layouts.main')
@section('title', 'Units')
@section('content')
<section class="page-header cover-vertical wide-map">
	<!-- will eventually add a map we dynamically drop locations onto -->
	{{-- <iframe src="https://www.google.com/maps/d/embed?mid=1riftuTRxvy14w2F-BYw9wl8fXRnpFncc"></iframe> --}}
	<div id="map"></div>
	<script>
	function initMap() {
		var map = new google.maps.Map(
			document.getElementById('map'), { zoom: 12, center: { lat: 51.48, lng: -2.609 }}
		);
	}
	</script>
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
					<div class="col col-12 col-md-4">
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8I5WdQ_vYkyxgRLTfGvX3MnGDbXZ7xzI&callback=initMap"></script>
@endsection
