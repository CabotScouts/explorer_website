{{-- TODO: Add proper description columns to pages --}}
{{-- TODO: Add post data type and structure (difference between a page and post?) --}}
@if(App::environment('production'))
<meta property="og:url" content="{{ url()->current() }}" />
@if(isset($page))
	<meta property="og:type" content="website" />
	<meta property="og:title" content="{{ $page->title }}" />
	<meta property="og:description" content="{{ $page->body }}" />
	@if($page->image)
		<meta property="og:image" content="{{ $page->image }}" />
	@endif
@elseif(isset($post))
	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{ $post->title }}" />
	<meta property="og:description" content="{{ $post->summary }}" />
	@if($post->image)
		<meta property="og:image" content="{{ $page->image }}" />
	@endif
@endif
<meta property="og:locale" content="en_GB"  />
@endif
