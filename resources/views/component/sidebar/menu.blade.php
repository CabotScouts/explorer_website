<?php $menu = menu(trim($content)); ?>

@if($menu)
<div class="block column col-12 col-md-4 col-sm-12">
	@if($title)
		<div class="title">{{ $title }}</div>
	@endif
	{{ $menu }}
</div>
@endif
