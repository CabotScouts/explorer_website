<?php $menu = menu(trim($content)); ?>

@if($menu)
<div class="column col-12 col-md-4 col-sm-12">
	@if($title)
		<h5>{{ $title }}</h5>
	@endif
	{{ $menu }}
</div>
@endif
