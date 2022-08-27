@extends('layouts.main')
@section('title', 'Manage Instagram')
@section('content')
@include('component.alerts')
<section class="container pad space">
  <div class="row">
    <div class="col col-12">
      <h1>Manage Instagram</h1>
      <p>
        <a href="{{ route('instagram.login') }}" class="btn btn-success">New Instagram Login</a>
        <a href="{{ route('instagram.force-update') }}" class="btn btn-warning">Force Update</a>
        <a href="{{ route('instagram.remove-media') }}" class="btn btn-danger">Remove All Media</a>
      </p>
      @if(count($users) > 0)
        <table class="table">
          <thead>
            <tr>
              <td>Instagram User</td>
              <td colspan="2">Token needs refreshing</td>
              <td>Token Expires</td>
              <td>Media Count</td>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{ $user->ig_username }}</td>
              <td>{{ $user->tokenNeedsRefresh() ? "Yes" : "No" }}</td>
              <td><a href="{{ route('instagram.refresh-token', ['id' => $user->id])}}" class="btn btn-secondary">Refresh Token</a></td>
              <td>{{ $user->token_expires }}</td>
              <td>{{ $user->media()->count() }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>
</section>
@endsection
