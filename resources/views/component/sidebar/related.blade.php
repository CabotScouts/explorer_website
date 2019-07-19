<?php
use App\Page;
$pages = Page::where([
	['slug', 'like', $page->slug."%"],
	['status', 1],
	['id', '!=', $page->id]
	])->orderBy('title', 'asc')->get();
?>

@if(count($pages) > 0)
	<div class="block column col-12 col-md-4 col-sm-12">
		@if($title)
			<div class="title">{{ $title }}</div>
		@endif
		<ul>
			@foreach($pages as $sibling)
				<li>
					<a href="{{ route('page', ['page' => $sibling->slug]) }}">{{ $sibling->title}}</a>
				</li>
			@endforeach
			{!! $content !!}
		</ul>
	</div>
@endif
