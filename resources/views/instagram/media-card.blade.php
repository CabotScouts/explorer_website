{{-- TODO: add lightbox to images, add video media_type controls --}}
<div class="col col-12 col-xs-12 col-md-2 col-xl-4 wall-item">
  <div class="card">
    @if($media->media_type == "IMAGE")
      <a href="{{ $media->media_url }}" data-toggle="lightbox"><img class="card-img-top" src="{{ $media->media_url }}" /></a>
    @elseif($media->media_type == "VIDEO")
      <img class="card-img-top" src="{{ $media->thumbnail_url }}" />
      {{-- Add play icon over image - sort media player --}}
    @elseif($media->media_type == "CAROUSEL_ALBUM")
    <div id="{{ $media->id }}" class="carousel slide" data-interval="false">
      <div class="carousel-inner">
        @foreach($media->children()->get() as $child)
        <div class="carousel-item @if($loop->first) active @endif">
          <a href="{{ $child->media_url }}" data-toggle="lightbox" data-gallery="{{ $media->id }}"><img class="card-img-top" src="{{ $child->media_url }}" /></a>
        </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#{{ $media->id }}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#{{ $media->id }}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    @endif
    <div class="card-body">
      <p class="card-text">
        {!! $media->display_caption !!}
      </p>
      <span class="text-muted small">
        {{ $media->posted }}
      </span>
    </div>
  </div>
</div>
