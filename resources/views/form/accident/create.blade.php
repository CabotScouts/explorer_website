@extends('layouts.form')
@section('title', 'Accident Report')
@section('content')
	<div class="container">
		<div class="row justify-content-md-center align-items-center">
			<div class="col col-12 col-lg-8">
				<form method="post" action="{{ route('accidentFormStore') }}" novalidate>
					@csrf

					<div class="row">
						<div class="col-12 text-center mt-2">
							<h1>Report an Accident</h1>
							<small>Fields marked with * are required - please try to give as much information as possible</small>
						</div>
					</div>

					@if($errors->any())
					<div class="row mt-2">
						<div class="col-12">
								@include('form.errors')
						</div>
					</div>
					@endif

					<div class="form-row mt-2">
						<div class="form-group col-lg-6">
							<label for="reporterName">Your Name*</label>
							<input class="form-control" type="text" name="reporterName" id="reporterName" aria-describedby="reporterName-help" placeholder="Name" value="{{ old('reporterName') }}" required />
							<small id="reporterName-help" class="form-text text-muted">The name of the person reporting the accident</small>
						</div>

						<div class="form-group col-lg-6">
							<label for="reporterEmail">Your Email*</label>
							<input class="form-control" type="email" name="reporterEmail" id="reporterEmail" aria-describedby="reporterEmail-help" placeholder="Email" value="{{ old('reporterEmail') }}" required />
							<small id="reporterName-help" class="form-text text-muted">The email address of the person reporting the accident (a copy of the report will be sent to this)</small>
						</div>

						<div class="form-group col-lg-6">
							<label for="theirName">Their Name*</label>
							<input class="form-control" type="text" name="theirName" id="theirName" aria-describedby="theirName-help" placeholder="Name" value="{{ old('theirName') }}" required />
							<small id="theirName-help" class="form-text text-muted">The name of the person who had the accident</small>
						</div>

						<div class="form-group col-lg-6">
							<label for="their-unit">Their Unit</label>
							<select class="form-control" name="theirUnit" id="theirUnit" aria-describedby="theirUnit-help">
								<option value="">Unit</option>
								@foreach($units as $unit)
								<option value="{{ $unit->shortname }}"{{ old('theirUnit') == $unit->
									shortname ? ' selected' : '' }}>{{ $unit->name }}</option>
								@endforeach
							</select>
							<small id="theirUnit-help" class="form-text text-muted">The Explorer Unit they're in</small>
						</div>

						<div class="col col-12">
							<hr />
						</div>

						<div class="form-group col-lg-6">
							<label for="when">When</label>
							<input class="form-control" type="date" name="when" id="when" aria-describedby="when-help" placeholder="Date" value="{{ old('when') }}" />
							<small id="when-help" class="form-text text-muted">When did the accident happen</small>
						</div>

						<div class="form-group col-lg-6">
							<label for="where">Where</label>
							<input class="form-control" type="text" name="where" id="where" aria-describedby="where-help" placeholder="Location" value="{{ old('where') }}" />
							<small id="where-help" class="form-text text-muted">Where did the accident happen</small>
							<div class="form-check mt-3">
								<input class="form-check-input" type="checkbox" name="groupPremises" id="groupPremises" aria-describedby="groupPremises-help"{{ old('groupPremises') == true ? ' checked' : '' }}/>
								<label class="form-check-label" for="groupPremises">The accident happened at our host Group's premises</label>
							</div>
						</div>

						<div class="form-group col-12">
							<label for="description">What Happened</label>
							<textarea rows="6" class="form-control" name="description" id="description" aria-describedby="description-help" placeholder="Description">{{ old('description') }}</textarea>
							<small id="description-help" class="form-text text-muted">Describe the accident and how it happened</small>
						</div>

						<div class="form-group col-12">
							<label for="treatment">Treatment Given</label>
							<textarea rows="6" class="form-control" name="treatment" id="treatment" aria-describedby="treatment-help" placeholder="Treatment">{{ old('treatment') }}</textarea>
							<small id="treatment-help" class="form-text text-muted">Describe any treatment given to the injured person</small>
						</div>

						<div class="form-group col-12">
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" name="parentNotified" id="parentNotified"{{ old('parentNotified') == true ? ' checked' : '' }}/>
								<label class="form-check-label" for="parentNotified">Parent/carer has been notified of the accident (if an Explorer)</label>
							</div>
						</div>

						<div class="col col-12">
							<hr />
						</div>

						<div class="form-group col-12">
							<h3>Further Treatment</h3>
							<small id="further-treatment-help" class="form-text text-muted">If further treatment (an ambulance, a visit to hospital, a doctor, or the dentist) was required, then HQ must be notified - <a href="https://scouts.org.uk/contact-us" target="_blank" rel="noreferrer noopener">contact the Info Centre</a> at the earliest opportunity</small>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" name="furtherTreatment" id="furtherTreatment" aria-describedby="further-treatment-help"{{ old('furtherTreatment') == true ? ' checked' : '' }}/>
								<label class="form-check-label" for="furtherTreatment">Further treatment was required</label>
							</div>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" name="hqNotified" id="hqNotified"{{ old('hqNotified') == true ? ' checked' : '' }}/>
								<label class="form-check-label" for="hqNotified">HQ has been notified</label>
							</div>
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" name="unityNotified" id="unityNotified"{{ old('unityNotified') == true ? ' checked' : '' }}/>
								<label class="form-check-label" for="unityNotified">Unity Insurance form has been completed</label>
							</div>
						</div>

						<div class="form-group col-12 mt-2">
							<input class="form-control btn btn-outline-primary" type="submit" name="submit" value="Send Report" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
