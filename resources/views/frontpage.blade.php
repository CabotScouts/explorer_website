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
@include('component.linkblocks')
@endsection
