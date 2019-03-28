@extends('layouts.main')
@section('title', 'Units')
@section('content')
<section class="page units container grid-lg pad space">
	<div class="columns">
		<div class="column col-12">
			<h2>Explorer Units</h2>
			<p>
				Cabot has six core Explorer Units, which meet weekly across the District, as well as a Young Leaders Unit, which delivers training throughout the year for those who wish to volunteer with younger Scouting sections.
			</p>
			<p>
				For information on moving on from Scouts to Explorers, or on joining from outside the movement, please have a look at our <a href="/joining/">joining information page</a>.
			</p>

			<h4 class="hide-sm">Where are our Units?</h4>
		</div>

		<div class="column col-8 col-md-12">
			<div class="hide-sm">
				<iframe src="https://www.google.com/maps/d/embed?mid=1riftuTRxvy14w2F-BYw9wl8fXRnpFncc"></iframe>
			</div>
		</div>

		<div class="units-list column col-4 col-md-12">
			<div class="columns">
				@if(count($units) > 0)
					@foreach($units as $unit)
					<div class="column col-sm-12 col-md-6 col-12">
						<a href="/units/{{ $unit->shortname }}/">
							<div class="card">
								<div class="card-header">
									<div class="card-title">{{ $unit->name }}</div>
									@if($unit->day > -1)
									<div class="card-subtitle">{{ $unit->dayString }}</div>
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
