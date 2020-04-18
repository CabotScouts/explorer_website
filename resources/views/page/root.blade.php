@extends('layouts.main')
@section('content')
@if($masthead->header)
@component('component.header', ['orientation' => 'vertical', 'image' => $masthead->header->src, 'position' => $masthead->header->position ])
	{!! $masthead->body !!}
@endcomponent
@endif
@if($page)
{!! $page->body !!}
@endif
@include('component.linkblocks')
@endsection
