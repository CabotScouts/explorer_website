{{-- TODO: add lightbox to images, add video media_type controls --}}
<div class="col col-12 col-sm-6 col-md-6 col-xl-4 wall-item">
  <div class="card">
    @if($media->media_type == "CAROUSEL_ALBUM")
    <div id="{{ $media->id }}" class="carousel slide" data-interval="false">
      <div class="carousel-inner">
        @foreach($media->children()->get() as $child)
        <div class="carousel-item @if($loop->first) active @endif">
          @include('instagram.media-item', ['media' => $child, 'gallery' => $media->id])
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
    @else
      @include('instagram.media-item', ['media' => $media, 'gallery' => $media->id])
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
