<section class="crumb pad">
	<div class="container">
		<div class="row">
			<div class="col col-12 col-md-6 col-lg-8">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					@foreach($segments as $segment)
						@if($loop->last)
							<li class="breadcrumb-item active" aria-current="page">
								{{ $segment['name'] }}
							</li>
						@else
							<li class="breadcrumb-item">
								<a href="{{ $segment['url'] }}">{{ $segment['name'] }}</a>
							</li>
						@endif
						</li>
					@endforeach
					</ol>
				</nav>
			</div>
			@if(isset($units))
			<div class="actions col col-md-6 col-lg-4 d-none d-md-block">
				@include('component.unit.unit-dropdown', ['units' => $units])
			</div>
			@endif
		</div>
	</div>
</section>
