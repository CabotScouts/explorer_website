@extends('layouts.main')
@section('title', 'Units')
@section('content')
@if(isset($media))
<section class="container pad space">
  <div class="row">
    <div class="page-content col col-12">
    <h1>{{ $tag->formatted }}</h1>
    @include('instagram.media', ['media' => $media])
    </div>
  </div>
</section>
@endif
@endsection
