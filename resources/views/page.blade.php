@extends('layouts.main')
@section('title', $page->title)
@section('content')
<section class="page-header cover-horizontal" style="background: url('/assets/img/campfire-opt.jpg'); background-size: cover;">
	<div class="page-title">
		<div class="container grid-lg">
			<div class="columns pad">
				<div class="column col-12">
					<h2>{{ $page->title }}</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="page pad space">
	<div class="grid-lg container">
		<div class="columns">
			{{-- <div class="column col-12">
				<h2>{{ $page->title }}</h2>
			</div> --}}
			<div class="column col-8 col-md-12">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec libero in orci laoreet malesuada. Sed risus nisi, pulvinar eget justo quis, aliquam tincidunt turpis. Phasellus venenatis venenatis nibh. Nam vel neque tempus, malesuada tortor a, lobortis arcu. Aenean eget dolor sollicitudin mauris fringilla dignissim. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas gravida molestie interdum. Cras mattis venenatis lacus in tincidunt. Proin quis nisi tincidunt, lobortis magna imperdiet, consectetur est. Vestibulum facilisis viverra feugiat. Vestibulum blandit sit amet magna ut convallis.
				</p>
				<p>
					Duis porttitor viverra nisi, nec condimentum quam lobortis sit amet. Maecenas ligula felis, hendrerit elementum maximus eget, lobortis nec tellus. Sed in nisi lectus. Vestibulum ut dolor consequat, tincidunt quam sed, tempor sapien. Integer quis elit hendrerit, congue quam ac, sodales arcu. Integer consectetur purus eu orci pulvinar posuere. Donec aliquet pharetra ex. Sed semper euismod arcu nec convallis. Curabitur mi tortor, feugiat at risus non, aliquam consectetur erat. Nulla sed libero eu erat pharetra pellentesque a nec elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
				</p>
				<p>
					Aenean varius elit et sodales condimentum. Mauris odio est, malesuada sed eleifend eget, fermentum egestas purus. Etiam at sodales odio. Nunc ac condimentum eros. Curabitur varius non massa vitae ullamcorper. Phasellus id vestibulum leo. Donec consectetur justo vel mauris aliquam ultricies. Praesent porta erat sed mauris elementum dictum. Vestibulum lacinia nulla nec accumsan fringilla. Proin scelerisque leo lorem, eu fermentum mi rutrum nec. Sed pretium euismod ipsum quis varius. Morbi varius neque eu sem pulvinar, sit amet consequat tortor rutrum. Nunc mattis pharetra sapien, at mollis enim blandit varius.
				</p>
				<p>
					Cras libero velit, porttitor vitae urna eget, ullamcorper varius justo. Nunc ut fringilla purus. Donec suscipit velit iaculis bibendum cursus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse pulvinar tincidunt enim. Maecenas ipsum dolor, rhoncus vitae diam sit amet, placerat eleifend felis. Suspendisse imperdiet sem at eros varius, eget luctus libero maximus. Morbi placerat dolor eget justo iaculis sodales. Sed tincidunt congue fringilla. Nulla dignissim porta lacinia. Maecenas dapibus ornare pulvinar.
				</p>
				<p>
					Etiam arcu magna, pellentesque egestas cursus sed, mollis eu neque. Nulla in semper magna. Cras hendrerit, orci id accumsan consectetur, dolor nisi consectetur orci, a fermentum dolor lorem in arcu. Vivamus sit amet elit mi. Fusce nec nisl aliquet, dapibus sapien quis, elementum dolor. Vestibulum sed est maximus, maximus quam vestibulum, luctus urna. Praesent tristique at massa vitae porttitor. Integer lectus enim, ultricies sit amet metus sit amet, pretium pretium urna.
				</p>
			</div>

			<div class="page-sidebar column col-4 col-md-12">
				<div class="columns">
					<div class="column col-12 col-md-4 col-sm-12">
						<h5>Sidebar 1</h5>
						<p>
							This is a place some extra links or information can be added...
						</p>
					</div>
					<div class="column col-12 col-md-4 col-sm-12">
						<h5>Sidebar 2</h5>
						<p>
							This is a place some extra links or information can be added...
						</p>
					</div>
					<div class="column col-12 col-md-4 col-sm-12">
						<h5>Sidebar 3</h5>
						<p>
							This is a place some extra links or information can be added...
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
