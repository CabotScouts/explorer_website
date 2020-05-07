@extends('layouts.main')
@section('title', "View Shortlink")
@section('content')
  <section class="page container pad space">
    <div class="row">
      <div class="col col-12">
        <h1>View Shortlink</h1>
      </div>

      <div class="page-content col col-12">
        {{ $link }}
      </div>
    </div>
  </section>
@endsection
