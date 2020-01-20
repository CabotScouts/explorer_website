@if($media)
@push('additional-head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
@endpush
@push('additional-foot')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});
</script>
@endpush
<div class="card-columns">
@foreach($media as $m)
  @include('instagram.media-card', ['media' => $m])
@endforeach
</div>
@endif
