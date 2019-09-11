@extends('layouts.main')
@section('title', 'Calendar')
@section('content')
<section class="calendar page pad space">
<!-- Will eventually replace this with an native implementation, but this'll do for now... -->
	<div class="container">
		<div class="row">
			<div class="col col-12">
				<h1>District Explorer Calendar</h1>
			</div>

			<div class="col col-12">
				 <iframe src="https://calendar.google.com/calendar/embed?title=%20&amp;showTz=0&amp;wkst=2&amp;bgcolor=%23f7f8f9&amp;src=lna0octklnma00thnlq8e2jq20%40group.calendar.google.com&amp;color=%23AB8B00&amp;src=mghnd321gnm02vs5361s2lq4e8%40group.calendar.google.com&amp;color=%232F6309&amp;src=h1rprkaids2hafhvq7u0tsn7k8%40group.calendar.google.com&amp;color=%2329527A&amp;src=d21a2un76qqb17pdjdk2ad4gks%40group.calendar.google.com&amp;color=%23182C57&amp;src=34brbi6cbjdo30a725ln6qusms%40group.calendar.google.com&amp;color=%23711616&amp;ctz=Europe%2FLondon" scrolling="no"></iframe>
			 </div>
		</div>
	</div>
</section>
@endsection
