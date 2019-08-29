@if(!isset($orientation) || $orientation == 'horizontal')
<section class="page-header cover-horizontal" style="background: url('/storage/{{ $image }}'); background-size: cover; background-position: {{ $position }};">
	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col col-12">
					<h1>{{ $slot }}</h1>
				</div>
			</div>
		</div>
	</div>
</section>
@else
<section class="page-header cover-vertical" style="background: url('/storage/{{ $image }}'); background-size: cover; background-position: {{ $position }};">
	<div class="container">
		<div class="row">
			<div class="col col-12 col-lg-5">
				{{ $slot }}
			</div>
		</div>
	</div>
</section>
@endif
