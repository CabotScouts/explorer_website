@if(count($units) > 0)
<li class="units-dropdown dropdown mr-4">
	<a class="navbar-link dropdown-toggle" href="#" id="unitsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Units</a>

	<div class="dropdown-menu" aria-labelledby="unitsDropdown">
		@foreach($units as $u)
		<a class="dropdown-item" href="{{ route('unit.view', $u->shortname) }}">{{ $u->name }}</a>
		@endforeach
	</div>
</li>
@endif
