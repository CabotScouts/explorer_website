@extends('layouts.form')
@section('title', 'Accident Report')
@section('content')
	<div class="container">
		<div class="row justify-content-md-center align-items-center">
			<div class="col col-12 col-lg-8">
				<form method="post" action="{{ route('accidentFormStore') }}">
					@csrf

					<div class="row">
						<div class="col-12 text-center mt-2">
							<h1>Report an Accident</h1>
						</div>
					</div>

					@if($errors->any())
					<div class="row mt-2">
						<div class="col-12">
								@include('form.errors')
						</div>
					</div>
					@endif

					<div class="form-row">
						<div class="form-group col-12 mt-2">
							<label for="reporterName">Your Name*</label>
							<input class="form-control" type="text" name="reporterName" id="reporterName" aria-describedby="reporterName-help" placeholder="Name" value="{{ old('reporterName') }}" required />
							<small id="reporterName-help" class="form-text text-muted">The name of the person reporting the accident</small>
						</div>

						<div class="form-group col-12">
							<label for="reporterEmail">Your Email*</label>
							<input class="form-control" type="email" name="reporterEmail" id="reporterEmail" aria-describedby="reporterEmail-help" placeholder="Email" value="{{ old('reporterEmail') }}" required />
							<small id="reporterName-help" class="form-text text-muted">The email address of the person reporting the accident (a copy of the report will be sent to this)</small>
						</div>

						<div class="form-group col-md-6">
							<label for="theirName">Their Name*</label>
							<input class="form-control" type="text" name="theirName" id="theirName" aria-describedby="theirName-help" placeholder="Name" value="{{ old('theirName') }}" required />
							<small id="theirName-help" class="form-text text-muted">The name of the person who had the accident</small>
						</div>

						<div class="form-group col-md-6">
							<label for="their-unit">Their Unit*</label>
							<select class="form-control" name="theirUnit" id="theirUnit" aria-describedby="theirUnit-help" required>
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

						<div class="form-group col-12">
							<label for="when">When</label>
							<input class="form-control" type="date" name="when" id="when" aria-describedby="when-help" placeholder="Date" value="{{ old('when') }}" />
							<small id="when-help" class="form-text text-muted">When did the accident happen</small>
						</div>

						<div class="form-group col-12">
							<label for="where">Where</label>
							<input class="form-control" type="text" name="where" id="where" aria-describedby="where-help" placeholder="Location" value="{{ old('where') }}" />
							<small id="where-help" class="form-text text-muted">Where did the accident happen</small>
						</div>

						<div class="form-group col-12">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="groupPremises" id="groupPremises" aria-describedby="groupPremises-help" {{ old('groupPremises') == true ? 'checked' : '' }}/>
								<label class="form-check-label" for="groupPremises">The accident happened at our host Group</label>
							</div>
						</div>

						<div class="col col-12">
							<hr />
						</div>

						<div class="form-group col-12">
							<label for="description">What Happened</label>
							<textarea class="form-control" name="description" id="description" aria-describedby="description-help" placeholder="Description" required>{{ old('description') }}</textarea>
							<small id="description-help" class="form-text text-muted">Describe how the accident happened</small>
						</div>

						<div class="form-group col-12">
							<label for="treatment">Treatment Given</label>
							<textarea class="form-control" name="treatment" id="treatment" aria-describedby="treatment-help" placeholder="Treatment" required>{{ old('treatment') }}</textarea>
							<small id="treatment-help" class="form-text text-muted">Describe what treatment was given to the injured person</small>
						</div>

						<div class="form-group col-12">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="furtherTreatment" id="furtherTreatment"{{ old('furtherTreatment') == true ? ' checked' : '' }}/>
								<label class="form-check-label" for="furtherTreatment">Further treatment (a visit to hospital, a doctor, or a dentist) was required</label>
							</div>
						</div>

						<div class="form-group col-12">
							<input class="form-control" type="submit" name="submit" value="Submit Report" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
