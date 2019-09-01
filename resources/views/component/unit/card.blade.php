<div class="card unit-card">
	@include('component.unit.logo', ['unit' => $unit])
	<div class="card-body">
		<h5 class="card-title">{{ $unit->name }}</h5>
	@if($unit->day > -1)
		<h6 class="card-subtitle muted">{{ $unit->dayString }}s</h6>
	@else
		<h6 class="card-subtitle muted">&nbsp;</h6>
	@endif
	</div>
@if(!isset($hideactions))
	<div class="card-body">
		<a href="{{ route('view-unit', ['name' => $unit->shortname ]) }}/" class="btn btn-success">See Unit</a>
	</div>
@endif
</div>
