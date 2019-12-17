<nav class="navbar navbar-light navbar-expand-md">
	<div class="container">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav mr-auto">
				<?php print(menu('main', 'component.menu')); ?>
			</ul>
		</div>

	@auth
		<div class="d-none d-md-block">
			<ul class="navbar-nav">
				{{-- Units Menu --}}
				@if($units || $unit)
					<li class="navbar-item dropdown mr-4">
						<a class="navbar-link dropdown-toggle" href="#" id="unitsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Units</a>

						<div class="dropdown-menu" aria-labelledby="unitsDropdown">
							@if($unit)
							<a class="dropdown-item" href="{{ route('voyager.units.edit', $unit->id) }}" target="_blank">Edit Explorer Unit</a>
							@endif
							<a class="dropdown-item" href="{{ route('voyager.units.create') }}" target="_blank">Add Explorer Unit</a>
						</div>
					</li>
				@endif

				{{-- Pages Menu --}}
				<li class="navbar-item dropdown mr-4">
					<a class="navbar-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>

					<div class="dropdown-menu" aria-labelledby="manageDropdown">
					@if($page)
						<a class="dropdown-item" href="{{ route('voyager.pages.edit', $page->id) }}" target="_blank">Edit Page</a>
					@endif
						<a class="dropdown-item" href="{{ route('voyager.pages.create') }}" target="_blank">Add New Page</a>
					</div>
				</li>

			{{-- Generic Manage Menu --}}
				<li class="navbar-item dropdown">
					<a class="navbar-link dropdown-toggle" href="#" id="manageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</a>

					<div class="dropdown-menu" aria-labelledby="manageDropdown">
						<a class="dropdown-item" href="{{ route('voyager.dashboard') }}" target="_blank">Dashboard</a>
						<a class="dropdown-item" href="{{ route('voyager.logout') }}">Logout</a>
					</div>
				</li>
			</ul>
		</div>
	@endauth
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
