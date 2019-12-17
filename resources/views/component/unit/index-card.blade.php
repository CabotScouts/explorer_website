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
		<a href="{{ route('view-unit', $unit->shortname) }}" class="mt-4 btn btn-sm btn-success">See Unit</a>
	</div>
	{{-- <ul class="list-group list-group-flush unit-card-links">
		<li class="list-group-item">
			<a href="{{ route('view-unit', ['name' => $unit->shortname ]) }}/" class="btn btn-sm btn-outline-primary">See Unit</a>
		</li>
	</ul> --}}
</div>
