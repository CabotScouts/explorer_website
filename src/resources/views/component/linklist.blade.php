@foreach($items as $item)
	@if(!$loop->first) - @endif
	<a href="{{ $item->link() }}">{{ $item->title }}</a>
@endforeach
