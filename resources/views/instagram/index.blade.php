@extends('layouts.main')
@section('title', $tag->formatted)
@section('content')
@if(isset($media))
<section class="page container pad space">
  <div class="row">
    <div class="col col-12 col-lg-10 mt-1 mb-3">
      <h1>{{ $tag->formatted }}</h1>
    </div>
    <div class="col col-lg-2">
      <div class="dropdown mt-2 mr-4 text-right">
        <a class="navbar-link dropdown-toggle" href="#" id="albumsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Albums</a>

      	<div class="dropdown-menu" aria-labelledby="albumsDropdown">
      		@foreach($tags as $t)
      		<a class="dropdown-item" href="{{ route('instagram.view', ['tag' => $t->tag]) }}">{{ $t->formatted }}</a>
      		@endforeach
      	</div>
      </div>
    </div>
    <div class="page-content col col-12">
    @include('instagram.media', ['media' => $media])
    </div>
  </div>
</section>
@endif
@endsection
