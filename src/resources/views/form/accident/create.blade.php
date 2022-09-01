@extends('layouts.form')
@section('title', 'Accident Report')

@section('additional-head')
{!! htmlScriptTagJsApi() !!}
@endsection

@section('content')
	
<form method="post" action="{{ route('accidentFormStore') }}">
	@csrf

	<div class="row">
		<div class="col-12 text-center">
			<h1 class="huge">Report an Accident</h1>
		</div>
	</div>

	@if($errors->any())
	<div class="row mt-2">
		<div class="col-12">
				@include('form.errors')
		</div>
	</div>
	@endif

	<div class="row g-3">
		<div class="col col-12">
			<h2 class="mt-4">Essential Information</h2>
			<p><small>Fields marked with * are required - please try to give as much information as possible</small></p>
		</div>
		
		<div class="form-group col-lg-6">
			<label class="form-label" for="reporterName">Your Name*</label>
			<input class="form-control" type="text" name="reporterName" id="reporterName" aria-describedby="reporterName-help" placeholder="Name" value="{{ old('reporterName') }}" required />
			<small id="reporterName-help" class="form-text text-muted">The name of the person reporting the accident</small>
		</div>

		<div class="form-group col-lg-6">
			<label class="form-label" for="reporterEmail">Your Email*</label>
			<input class="form-control" type="email" name="reporterEmail" id="reporterEmail" aria-describedby="reporterEmail-help" placeholder="Email" value="{{ old('reporterEmail') }}" required />
			<small id="reporterName-help" class="form-text text-muted">The email address of the person reporting the accident (a copy of the report will be sent to this)</small>
		</div>

		<div class="form-group col-lg-6">
			<label class="form-label" for="theirName">Their Name*</label>
			<input class="form-control" type="text" name="theirName" id="theirName" aria-describedby="theirName-help" placeholder="Name" value="{{ old('theirName') }}" required />
			<small id="theirName-help" class="form-text text-muted">The name of the person who had the accident</small>
		</div>

		<div class="form-group col-lg-6">
			<label class="form-label" for="their-unit">Their Unit</label>
			<select class="form-control" name="theirUnit" id="theirUnit" aria-describedby="theirUnit-help">
				@foreach($units as $unit)
				<option value="{{ $unit->shortname }}"{{ old('theirUnit') == $unit->
					shortname ? ' selected' : '' }}>{{ $unit->name }}</option>
				@endforeach
			</select>
			<small id="theirUnit-help" class="form-text text-muted">The Explorer Unit they're in</small>
		</div>

		<div class="form-group col-lg-6">
			<label class="form-label" for="when">When</label>
			<input class="form-control" type="date" name="when" id="when" aria-describedby="when-help" placeholder="Date" value="{{ old('when') }}" />
			<small id="when-help" class="form-text text-muted">When did the accident happen</small>
		</div>

		<div class="form-group col-lg-6">
			<label class="form-label" for="where">Where</label>
			<input class="form-control" type="text" name="where" id="where" aria-describedby="where-help" placeholder="Location" value="{{ old('where') }}" />
			<small id="where-help" class="form-text text-muted">Where did the accident happen</small>
		</div>

		<div class="form-group col-12">
			<div class="form-check mt-2">
				<input class="form-check-input" type="checkbox" name="groupPremises" id="groupPremises" aria-describedby="groupPremises-help"{{ old('groupPremises') == true ? ' checked' : '' }}/>
				<label class="form-check-label" for="groupPremises">The accident happened at our host Group's premises</label>
			</div>
			<div class="form-check mt-2">
				<input class="form-check-input" type="checkbox" name="parentNotified" id="parentNotified"{{ old('parentNotified') == true ? ' checked' : '' }}/>
				<label class="form-check-label" for="parentNotified">A parent/carer has been notified of the accident (if an Explorer)</label>
			</div>
		</div>

		<div class="form-group col-12">
			<h2 class="mt-4">The Accident</h2>
			<label class="form-label" for="description">What Happened</label>
			<textarea rows="6" class="form-control" name="description" id="description" aria-describedby="description-help" placeholder="Description">{{ old('description') }}</textarea>
			<small id="description-help" class="form-text text-muted">Describe the accident and how it happened</small>
		</div>

		<div class="form-group col-12">
			<label class="form-label" for="treatment">Treatment Given</label>
			<textarea rows="6" class="form-control" name="treatment" id="treatment" aria-describedby="treatment-help" placeholder="Treatment">{{ old('treatment') }}</textarea>
			<small id="treatment-help" class="form-text text-muted">Describe any treatment given to the injured person</small>
		</div>

		<div class="form-group col-12">
			<h2 class="mt-4">Further Treatment</h2>
			<small id="further-treatment-help" class="form-text text-muted">If further treatment (an ambulance, a visit to hospital, a doctor, or the dentist) was required, then HQ must be notified. Please contact the DESC at the earliest opportunity.</small>
			<div class="form-check mt-2">
				<input class="form-check-input" type="checkbox" name="furtherTreatment" id="furtherTreatment" aria-describedby="further-treatment-help"{{ old('furtherTreatment') == true ? ' checked' : '' }}/>
				<label class="form-check-label" for="furtherTreatment">Further treatment was required</label>
			</div>
			<div class="form-check mt-2">
				<input class="form-check-input" type="checkbox" name="hqNotified" id="hqNotified"{{ old('hqNotified') == true ? ' checked' : '' }}/>
				<label class="form-check-label" for="hqNotified">DESC has been notified</label>
			</div>
			<div class="form-check mt-2">
				<input class="form-check-input" type="checkbox" name="unityNotified" id="unityNotified"{{ old('unityNotified') == true ? ' checked' : '' }}/>
				<label class="form-check-label" for="unityNotified">HQ report has been completed</label>
			</div>
		</div>

		<div class="form-group col-12 mt-4">
			<div class="mb-4">
				{!! htmlFormSnippet() !!}
			</div>
			<input class="form-control btn btn-primary" type="submit" name="submit" value="Submit Accident Report" />
		</div>
	</div>
</form>
@endsection
