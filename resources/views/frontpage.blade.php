@extends('layouts.main')
@section('content')
<section class="frontpage-wide">
	<div class="container grid-lg">
		<div class="columns">
			<div class="frontpage-intro column col-4 col-lg-5 col-md-12">
				<div>
					<h4>Ready for Adventure?</h4>
				</div>
				<div>
					<p>Cabot Explorers blurb</p>
					<p>What are our key points etc.</p>
				</div>
				<div class="tagline">
					<p>We prepare young people with Skills For Life.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="links pad">
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
