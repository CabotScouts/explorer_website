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
