<?php
function days($day) {
	$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
	if($day >= 0 && $day < 7) return $days[$day];
	return false;
}
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
				@if(count($units) > 0)
					@foreach($units as $unit)
					<?php $day = days($unit->day); ?>
					<div class="column col-sm-12 col-md-6 col-12">
						<a href="/units/{{ $unit->shortname }}/">
							<div class="card">
								<div class="card-header">
									<div class="card-title">{{ $unit->name }}</div>
									@if($day)
									<div class="card-subtitle">{{ $day }}</div>
									@endif
								</div>
							</div>
						</a>
					</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</section>
@endsection