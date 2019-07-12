<?php
// Finds pages with a shared root and links them
use App\Page;
$root = ($page->root) ? $page->root->slug : $page->slug;
$pages = Page::where('slug', 'like', $root."%")->where('status', 1)->orderBy('title', 'asc')->get();
?>

@if(count($pages) > 0)
	<div class="column col-12 col-md-4 col-sm-12">
		@if($title)
			<h5>{{ $title }}</h5>
		@endif
		<ul>
			@foreach($pages as $sibling)
			<li>
				<a href="{{ route('page', ['page' => $sibling->slug]) }}">{{ $sibling->title}}</a>
			</li>
			@endforeach
		</ul>
	</div>
@endif
