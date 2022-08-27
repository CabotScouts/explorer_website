@extends('layouts.main', ['page' => $page])
@section('title', $page->title)

@section('content')
@if($page->header)
@component('component.header', ['image' => $page->header->src, 'position' => $page->header->position])
	{{ $page->title }}
@endcomponent
@endif
@if($page->breadcrumb)
	@include('component.breadcrumb', ['segments' => $page->breadcrumb])
@endif
<section class="page pad space">
	<div class="container">
		<div class="row">
			@if($page->has_sidebar)
				<div class="page-content col col-12 col-lg-8">
			@else
				<div class="page-content col col-12">
			@endif
				@if(!$page->header)
					<h1>{{ $page->title }}</h1>
				@endif
				{!! $page->body !!}
			</div>

			@if($page->has_sidebar)
				<div class="page-sidebar col col-12 col-lg-4">
					<div class="row">
					{!! $page->formattedSidebar !!}
					</div>
				</div>
			@endif
		</div>
	</div>
</section>
@endsection
