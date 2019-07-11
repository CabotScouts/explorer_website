@extends('layouts.main', ['page' => $page])
@section('title', $page->title)

@section('content')
@if($page->image)
@component('component.header', ['image' => $page->image])
	{{ $page->title }}
@endcomponent
@endif
<section class="page pad space">
	<div class="grid-lg container">
		<div class="columns">
			@if(!$page->image)
				<div class="column col-12">
					<h2>{{ $page->title }}</h2>
				</div>
			@endif
			<div class="column col-8 col-md-12">
				{!! $page->body !!}
			</div>

			@if($page->sidebar)
				<div class="page-sidebar column col-4 col-md-12">
					<div class="columns">
					{!! $page->formattedSidebar !!}
					</div>
				</div>
			@endif
		</div>
	</div>
</section>
@endsection
