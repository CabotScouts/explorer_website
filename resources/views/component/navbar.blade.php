<?php
$user = Auth::user();
?>
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
		<div class="d-none d-lg-block">
			<ul class="navbar-nav navbar-admin">
				{{-- Units Menu --}}
				@if($user->hasPermission('add_units') || $user->hasPermission('edit_units'))
					<li class="navbar-item dropdown mr-4">
						<a class="navbar-link dropdown-toggle" href="#" id="unitsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Units</a>

						<div class="dropdown-menu" aria-labelledby="unitsDropdown">
							@if($unit && $user->hasPermission('edit_units'))
							<a class="dropdown-item" href="{{ route('voyager.units.edit', $unit->id) }}" target="_blank">Edit Explorer Unit</a>
							@endif
							@if($user->hasPermission('add_units'))
							<a class="dropdown-item" href="{{ route('voyager.units.create') }}" target="_blank">Add Explorer Unit</a>
							@endif
						</div>
					</li>
				@endif

				{{-- Pages Menu --}}
				@if($user->hasPermission('add_pages') || $user->hasPermission('edit_pages'))
				<li class="navbar-item dropdown mr-4">
					<a class="navbar-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>

					<div class="dropdown-menu" aria-labelledby="manageDropdown">
					@if($page && $user->hasPermission('edit_pages'))
						<a class="dropdown-item" href="{{ route('voyager.pages.edit', $page->id) }}" target="_blank">Edit Page</a>
					@endif
					@if($user->hasPermission('add_pages'))
						<a class="dropdown-item" href="{{ route('voyager.pages.create') }}" target="_blank">Add New Page</a>
					@endif
					</div>
				</li>
				@endcan

			{{-- Generic Manage Menu --}}
				<li class="navbar-item dropdown">
					<a class="navbar-link dropdown-toggle" href="#" id="manageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</a>

					<div class="dropdown-menu" aria-labelledby="manageDropdown">
						@if($user->hasPermission('browse_admin'))
						<a class="dropdown-item" href="{{ route('voyager.dashboard') }}" target="_blank">Dashboard</a>
						@endif
						@if($user->hasPermission('browse_media'))
						<a class="dropdown-item" href="{{ route('voyager.media.index') }}" target="_blank">Media</a>
						@endif
						@if($user->hasPermission('browse_users'))
						<a class="dropdown-item" href="{{ route('voyager.users.index') }}" target="_blank">Users</a>
						@endif
						@if($user->hasPermission('browse_settings'))
						<a class="dropdown-item" href="{{ route('voyager.settings.index') }}" target="_blank">Settings</a>
						@endif
						<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
					</div>
				</li>

				<li class="navbar-item navbar-avatar">
					<img src="{{ Auth::user()->avatarURL }}"  />
				</li>
			</ul>
		</div>
	@endauth
	</div>
</nav>
