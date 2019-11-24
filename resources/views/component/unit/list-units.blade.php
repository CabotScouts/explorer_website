@if(count($units) > 0)
	@foreach($units as $u)
		<li class="list-group-item">
			<a href="{{ route('view-unit', ['name' => $u->shortname ]) }}">{{ $u->name }}</a>
		</li>
	@endforeach
@endif
