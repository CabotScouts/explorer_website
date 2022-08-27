@if($media->media_type == "IMAGE")
  <a href="{{ $media->media_url }}" data-toggle="lightbox" data-gallery="{{ $gallery }}"><img class="card-img-top" src="{{ $media->media_url }}" /></a>
@elseif($media->media_type == "VIDEO")
  <a href="{{ $media->media_url }}" data-toggle="lightbox" data-gallery="{{ $gallery }}"><img class="card-img-top" src="{{ $media->media_thumbnail }}" /></a>
  {{-- Add play icon over image - sort media player --}}
@endif
