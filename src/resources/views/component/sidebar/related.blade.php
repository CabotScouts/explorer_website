<?php
use App\Models\Page;
$pages = Page::where([
	['slug', 'like', $page->slug."%"],
	['status', 1],
	['id', '!=', $page->id]
	])->orderBy('slug', 'asc')->get();
?>

@if(count($pages) > 0)
	<div class="block col col-12 col-md-4 col-lg-12 block-pages">
		@if($title)
			<div class="title">{{ $title }}</div>
		@endif
		<ul>
			@foreach($pages as $sibling)
				<li class="{{ $sibling->subclass }}">
					<a href="{{ route('page', ['page' => $sibling->slug]) }}">{{ $sibling->title}}</a>
				</li>
			@endforeach
			{!! $content !!}
		</ul>
	</div>
@endif
