@extends('layouts.main')
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

			<div class="page-sidebar column col-4 col-md-12">
				<div class="columns">
					<div class="column col-12 col-md-4 col-sm-12">
						<h5>Sidebar 1</h5>
						<p>
							This is a place some extra links or information can be added...
						</p>
					</div>
					<div class="column col-12 col-md-4 col-sm-12">
						<h5>Sidebar 2</h5>
						<p>
							This is a place some extra links or information can be added...
						</p>
					</div>
					<div class="column col-12 col-md-4 col-sm-12">
						<h5>Sidebar 3</h5>
						<p>
							This is a place some extra links or information can be added...
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
