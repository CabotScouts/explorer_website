<div class="card unit-card">
	<div class="card-img-top unit-card-header"@if($unit->color) style="background: {{ $unit->color }}"@endif>
		@if($unit->logo)
			<div class="unit-logo text-center">
				<img src="{{ asset('/storage/' . $unit->logo) }}" class="img-fluid" />
			</div>
		@else
			<div class="unit-logo default-logo text-center">
				<img src="{{ asset('/storage/units/default.png') }}" class="img-fluid" />
			</div>
		@endif
	</div>
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
