<section class="crumb pad">
	<div class="container">
		<div class="row">
			<div class="col col-12">
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
		</div>
	</div>
</section>
