<?php
$alerts = session('alert');
?>

@if($alerts)
<section class="alerts container pad space">
  @foreach($alerts as $type => $message)
  <div class="alert alert-{{ $type }}">{!! $message !!}</div>
  @endforeach
</section>
@endif
