@extends('layouts.main')
@section('title', $unit->name)
@section('content')
<section class="units container grid-lg pad">
	<div class="columns">
		<div class="column col-12">
			<h1>{{ $unit->name }}</h1>	
		</div>
	</div>
</section>
@endsection
