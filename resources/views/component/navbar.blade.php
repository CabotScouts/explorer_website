<div class="container grid-lg">
	<div class="navbar col-12">
			<div class="navbar-section" id="menu">
				<?php print(menu('main', 'component.menu')); ?>
			</div>

			@auth
			<div class="navbar-section hide-md">
					<div class="dropdown dropdown-right">
						<a href="#" class="dropdown-toggle" tabindex="0">Manage</a>
						<ul class="menu">
							@if($page)
							<li><a href="{{ route('voyager.pages.edit', ['id' => $page->id]) }}">Edit Page</a></li>
							{{-- <li><a href="{{ route('voyager.pages.create', ['slug' => $page->slug]) }}">Add Subpage</a></li> --}}
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
		</div>
	</div>
</div>
