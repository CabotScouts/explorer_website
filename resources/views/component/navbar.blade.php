<nav class="navbar navbar-expand-md">
	<div class="container">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav mr-auto">
				<?php print(menu('main', 'component.menu')); ?>
			</ul>
		</div>
	</div>
		{{-- @auth
		<div class="navbar-section hide-md">
				<div class="dropdown dropdown-right">
					<a href="#" class="dropdown-toggle" tabindex="0">Manage</a>
					<ul class="menu">
						@if($page)
						<li><a href="{{ route('voyager.pages.edit', ['id' => $page->id]) }}">Edit Page</a></li>
						<li><a href="{{ route('voyager.pages.create', ['slug' => $page->slug]) }}">Add Subpage</a></li>
						@endif
						<li><a href="{{ route('voyager.pages.create') }}">Add New Page</a></li>
						<li><a href="{{ route('voyager.dashboard') }}">Dashboard</a></li>
						<li><a href="{{ route('voyager.logout') }}">Logout</a></li>
					</ul>
				</div>
		</div>
		@endauth

	<div class="nav-toggle">
			<a href="#"><i class="icon icon-menu" id="nav-toggle"></i></a>
	</div> --}}
</nav>
