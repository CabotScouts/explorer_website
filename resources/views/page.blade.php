@extends('layouts.main', ['page' => $page])
@section('title', $page->title)

@section('content')
@if($page->image)
@component('component.header', ['image' => $page->image, 'position' => $page->headerposition])
	{{ $page->title }}
@endcomponent
@endif
@if($page->breadcrumb)
	<section class="crumb">
		<div class="grid-lg container">
			<div class="columns">
				<div class="column col-12">
					{!! $page->breadcrumb !!}
				</div>
			</div>
		</div>
	</section>
@endif
<section class="page pad space">
	<div class="grid-lg container">
		<div class="columns">
			@if($page->formattedSidebar)
				<div class="column col-8 col-md-12">
			@else
				<div class="column col-12">
			@endif
				@if(!$page->image)
					<h2>{{ $page->title }}</h2>
				@endif
				{!! $page->body !!}
			</div>

			@if($page->formattedSidebar)
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
