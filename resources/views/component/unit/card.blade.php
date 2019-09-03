<div class="card unit-card">
	@include('component.unit.logo', ['unit' => $unit])
	<div class="card-body">
		<h5 class="card-title">{{ $unit->name }}</h5>
		<h6 class="card-subtitle">
			@if($unit->day > -1)
				{{ $unit->dayString }}s
			@else
				&nbsp;
			@endif
			@if($unit->start_time)
				<small class="muted">({{ $unit->start_time }} - {{ $unit->end_time }})</small>
			@endif
		</h6>
	</div>
	<div class="card-body">
		<a href="{{ route('view-unit', ['name' => $unit->shortname ]) }}/" class="btn btn-success mb-2">See Unit</a>
		<a href="{{ route('view-unit', ['name' => $unit->shortname ]) }}/" class="btn btn-info">See Programme</a>
	</div>
</div>
