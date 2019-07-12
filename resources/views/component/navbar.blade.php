<div class="container grid-lg">
	<div class="navbar col-12">
			<div class="navbar-section" id="menu">
				<?php print(menu('main', 'component.menu')); ?>
			</div>

			@auth
			<div class="navbar-section hide-md">
					<a href="{{ route('voyager.dashboard') }}" class="manage-link">Manage</a>
			</div>
			@endauth

		<div class="nav-toggle">
				<a href="#"><i class="icon icon-menu" id="nav-toggle"></i></a>
		</div>
	</div>
</div>
