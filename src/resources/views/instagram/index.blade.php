<?php $title = $tag ? $tag->formatted : "Photos" ?>
@extends('layouts.main')
@section('title', $title)
@section('content')
@if(isset($media))
<section class="page container pad space">
  <div class="row">
    <div class="col col-12 col-sm-10 mt-1 mb-3">
      <h1>{{ $title }}</h1>
    </div>
    <div class="col col-12 col-sm-2 d-none d-sm-block">
      <div class="dropdown mt-2 mr-4 text-right">
        <a class="navbar-link dropdown-toggle" href="#" id="albumsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Albums</a>

      	<div class="dropdown-menu pre-scrollable" aria-labelledby="albumsDropdown">
          <a class="dropdown-item" href="{{ route('instagram.view') }}">All Photos</a>
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
