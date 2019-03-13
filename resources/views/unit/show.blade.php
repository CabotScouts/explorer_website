@extends('layouts.main')
@section('title', $unit->name)
@section('content')
	<section class="page-header cover-horizontal" style="background: url('/assets/img/canoe-opt.jpg'); background-size: cover;">
		<div class="page-title">
			<div class="container grid-lg">
				<div class="columns pad">
					<div class="column col-12">
						<h2>{{ $unit->name }}</h2>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="page pad space">
		<div class="container grid-lg">
			<div class="columns">
				<div class="column col-12">
					<p>
						Unit content
					</p>
				</div>
			</div>
		</div>
	</section>
@endsection
