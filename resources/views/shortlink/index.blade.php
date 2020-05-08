@extends('layouts.main')
@section('title', "Shortlinks")
@section('content')
@include('component.alerts')
  <section class="page container pad space">
    <div class="row">
      <div class="col col-10">
        <h1>Shortlinks</h1>
      </div>

      <div class="col col-2">
        <a href="{{ route('shortlink.create.form') }}" class="btn btn-primary btn-block">New Link</a>
      </div>

      <div class="page-content col col-12 mt-3">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">@sortablelink('code', 'Shortlink')</th>
                <th scope="col">@sortablelink('url', 'Target URL')</th>
                <th scope="col">@sortablelink('created_at', 'Created At')</th>
                <th scope="col">@sortablelink('clicks', 'Clicks')</th>
                <th scope="col" colspan="2">Actions</th>
              </tr>
            </thead>
            <tbody>
              @if($links->count())
                @foreach($links as $link)
                  <tr>
                    <td><a href="{{ $link->redirectURL }}" target="_blank">{{ $link->redirectURL }}</a></td>
                    <td><a href="{{ $link->url }}" target="_blank" rel="noreferrer nofollow">{{ $link->url }}</a></td>
                    <td>{{ $link->created_at }}</td>
                    <td>{{ $link->clicks }}</td>
                    {{-- <td><a href="{{ route('shortlink.edit.form', ['id' => $link->id]) }}">Edit</a></td> --}}
                    <td><a href="{{ route('shortlink.delete', ['id' => $link->id]) }}">Delete</a></td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="5">No Links!</td>
                  <td><a href="{{ route('shortlink.create.form') }}" class="btn btn-primary btn-block">New Link</a></td>
                </tr>
              @endif
            </tbody>
          </table>
          <p>
            {{ $links->links() }}
          </p>
      </div>
    </div>
  </section>
@endsection
