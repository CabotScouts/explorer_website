<?php $menu = menu(trim($content)); ?>

@if($menu)
<div class="block col col-12 col-md-4 col-lg-12">
	@if($title)
		<div class="title">{{ $title }}</div>
	@endif
	{{ $menu }}
</div>
@endif
