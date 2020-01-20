@if($media)
@push('additional-head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
@endpush
@push('additional-foot')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});
var $grid = $('.media-wall').imagesLoaded(function() {
  $grid.masonry({
    itemSelector: '.wall-item',
    columnWidth: '.wall-item',
    percentPosition: true,
  });
});
</script>
@endpush
<div class="media-wall">
  <div class="row">
    @foreach($media as $m)
      @include('instagram.media-card', ['media' => $m])
    @endforeach
  </div>
</div>
@endif
