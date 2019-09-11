@extends('layouts.main')
@section('content')
@if($page->header)
@component('component.header', ['orientation' => 'vertical', 'image' => $page->header->src, 'position' => $page->header->position ])
	{!! $page->body !!}
@endcomponent
@endif
@include('component.linkblocks')
@endsection
