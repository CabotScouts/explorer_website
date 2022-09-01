@php
	$needsParent = !$form->parentNotified;
	$needsHQ = $form->furtherTreatment && !$form->hqNotified;
@endphp

@extends('layouts.form')
@section('title', 'Accident Report')
@section('content')
<div class="row">
	<div class="col-12 text-center">
		<h1 class="huge">Report an Accident</h1>
	</div>

	<div class="col col-12 mt-4">
		<div class="alert alert-success">
			Your accident report (#{{ $id }}) has been submitted, and a copy sent to <strong>{{ $form->reporterEmail }}</strong> - please check you have received this.
		</div>
	</div>

	@if($needsParent || $needsHQ)	
	<div class="col col-12 mt-4">
		<h2>Next Steps</h2>

		@if($needsParent)
		<div class="alert alert-info mt-2">
			If an Explorer was involved in this accident, make sure their parent/carer is notified.
		</div>
		@endif

		@if($needsHQ)
		<div class="alert alert-danger">
			As this accident required further treatment, HQ must be notified. Please contact the DESC as soon as possible.
		</div>
		@endif
	</div>
	@endif

	<div class="col col-12 text-center mt-2">
		<a class="btn btn-primary" href="{{ route('accidentForm') }}">Submit another accident report</a>
	</div>
</div>
@endsection
