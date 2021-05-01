<?php
use App\Models\Page;
$pages = Page::where([
	['slug', 'like', 'units/'. $unit->shortname ."%"],
	['slug', '!=', 'units/'. $unit->shortname ],
	['status', 1]
	])->orderBy('slug', 'asc')->get();
?>

<div class="card unit-card">
	@include('component.unit.logo', ['unit' => $unit])
	<ul class="list-group list-group-flush unit-card-pages">
		<li class="list-group-item">
			<a href="{{ route('unit.view', $unit->shortname) }}">{{ $unit->name }} Home</a>
		</li>
		{{-- <li class="list-group-item">
			<a href="{{ route('view-unit', ['name' => $unit->shortname ]) }}/programme">Programme</a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('view-unit', ['name' => $unit->shortname ]) }}/contact">Contact</a>
		</li> --}}
		@if(count($pages) > 0)
			@foreach($pages as $sibling)
				<li class="list-group-item">
					<a href="{{ route('page', $sibling->slug) }}">{{ $sibling->title }}</a>
				</li>
			@endforeach
		@endif
	</ul>
</div>
