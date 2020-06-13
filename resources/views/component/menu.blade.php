<?php
$current = str_replace(config("app.url"), "", url()->current());
foreach($items as $item) {
	$url = $item->link();
	$active = ($url == $current && $item->title != 'Home') ? 'active' : '';
?>
<li class="nav-item {{ $active }}">
	<a class="nav-link" href="{{ $url }}">{{ $item->title }}</a>
</li>
<?php
}
?>
