<?php
$current = str_replace(env("APP_URL", ""), "", url()->current()) . "/";
foreach($items as $item) {
	$url = $item->link();
	$active = ($url == $current && $item->title != 'Home') ? ' class="active"' : '';
?>
<a href="{{ $url }}" {!! $active !!}>{{ $item->title }}</a>
<?php
}
?>
