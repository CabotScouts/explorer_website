{{-- TODO: add lightbox to images, add video media_type controls --}}
<div class="card">
  @if($media->media_type == "IMAGE")
    <img class="card-img-top" src="{{ $media->media_url }}" />
  @elseif($media->media_type == "VIDEO")
    <img class="card-img-top" src="{{ $media->thumbnail_url }}" />
    {{-- Add play icon over image - sort media player --}}
  @elseif($media->media_type == "CAROUSEL_ALBUM")
  <div id="{{ $media->id }}" class="carousel slide" data-interval="false">
    <div class="carousel-inner">
      @foreach($media->children()->get() as $child)
      <div class="carousel-item @if($loop->first) active @endif">
        <img class="d-block w-100" src="{{ $child->media_url }}">
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
