@if(!isset($orientation) || $orientation == 'horizontal')
<section class="page-header cover-horizontal" style="background: url('/storage/{{ $image }}'); background-size: cover;">
	<div class="page-title">
		<div class="container grid-lg">
			<div class="columns pad">
				<div class="column col-12">
					<h2>{{ $slot }}</h2>
				</div>
			</div>
		</div>
	</div>
</section>
@else
<section class="page-header cover-vertical" style="background: url('{{ $image }}'); background-size: cover;">
	<div class="container grid-lg">
		<div class="columns">
			<div class="column col-5 col-lg-5 col-md-8 col-xs-12">
				{{ $slot }}
			</div>
		</div>
	</div>
</section>
@endif
