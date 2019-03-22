@extends('layouts.main')
@section('content')
@component('component.header', ['orientation' => 'vertical', 'image' => setting('site.front-header')])
	<div>
		<h4>Ready for Adventure?</h4>
	</div>
	<div>
		<p>Cabot Explorers is the Scouting section for 14 - 18 year olds in Cabot District, providing new experiences, adventure, and skills to the young people of North West Bristol.</p>
	</div>
	<div class="tagline">
		<p>We prepare young people with Skills For Life.</p>
	</div>
@endcomponent

<section class="links pad space">
	<div class="container grid-lg">
		<div class="columns">
			<div class="column col-lg-4 col-sm-12">
				<h4>For Explorers</h4>
				<?php print(menu('frontpage-explorers')); ?>
			</div>

			<div class="column col-lg-4 col-sm-12">
				<h4>For Parents</h4>
				<?php print(menu('frontpage-parents')); ?>
			</div>

			<div class="column col-lg-4 col-sm-12">
				<h4>For Leaders</h4>
				<?php print(menu('frontpage-leaders')); ?>
			</div>
		</div>
	</div>
</section>
@endsection
