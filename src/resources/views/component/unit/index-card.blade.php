<div class="card unit-card">
	<a href="{{ route('unit.view', ['unit' => $unit->shortname]) }}">
	@include('component.unit.logo', ['unit' => $unit])
	</a>
	<div class="card-body">
		<h5 class="card-title">{{ $unit->name }}</h5>
		<h6 class="card-subtitle">
			@if($unit->day > -1)
				{{ $unit->dayString }}s
			@else
				&nbsp;
			@endif
			@if($unit->start_time)
				<small class="muted">({{ $unit->start }} - {{ $unit->end }})</small>
			@endif
		</h6>
		<a href="{{ route('unit.view', $unit->shortname) }}" class="mt-4 btn btn-sm btn-success">See Unit</a>
	</div>
</div>
