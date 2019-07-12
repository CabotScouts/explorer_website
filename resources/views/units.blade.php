@extends('layouts.main')
@section('title', 'Units')
@section('content')
<section class="page units container grid-lg pad space">
	<div class="columns">
		<div class="column col-12">
			@if(isset($page))
				{!! $page->body !!}
			@endif
		</div>

		<div class="column col-8 col-md-12">
			<div class="hide-sm">
				<iframe src="https://www.google.com/maps/d/embed?mid=1riftuTRxvy14w2F-BYw9wl8fXRnpFncc"></iframe>
			</div>
		</div>

		<div class="units-list column col-4 col-md-12">
			<div class="columns">
				@if(count($units) > 0)
					@foreach($units as $unit)
					<div class="column col-sm-12 col-md-6 col-12">
						@if($unit->url)
						<a href="{{ $unit->url }}/">
						@endif
							<div class="card">
								<div class="card-header">
									<div class="card-title">{{ $unit->name }}</div>
									@if($unit->day > -1)
									<div class="card-subtitle">{{ $unit->dayString }}</div>
									@endif
								</div>
							</div>
						@if($unit->url)
						</a>
						@endif
					</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</section>
@endsection
