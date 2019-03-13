@extends('layouts.main')
@section('content')
<section class="page-header cover-vertical" style="background: url('/assets/img/expedition-opt.jpg'); background-size: cover;">
	<div class="container grid-lg">
		<div class="columns">
			<div class="column col-5 col-lg-5 col-md-8 col-xs-12">
				<div>
					<h4>Ready for Adventure?</h4>
				</div>
				<div>
					<p>Cabot Explorers is the Scouting section for 14 - 18 year olds in Cabot District, providing new experiences, adventure, and skills to the young people of North West Bristol.</p>
				</div>
				<div class="tagline">
					<p>We prepare young people with Skills For Life.</p>
				</div>
			</div>
		</div>
	</div>
</section>

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
