@extends('layouts.form')
@section('title', 'Accident Report')
@section('content')
	<div class="container">
		<div class="row justify-content-md-center align-items-center">
			<div class="col col-12 col-lg-8">
				<div class="row">
					<div class="col-12 text-center mt-2">
						<h1>Report an Accident</h1>
					</div>

					<div class="col-12 mt-2">
						<div class="alert alert-success">
							The report has been successfully submitted, and a copy sent to {{ $email }}
						</div>

						@if($treatment)
							<div class="alert alert-warning">
								As this accident required further treatment, headquarters must be notified - <a class="alert-link" href="https://scouts.org.uk/contact-us" target="_blank" rel="noreferrer noopener">please contact the Info Centre</a> at the earliest opportunity.
							</div>
						@endif
					</div>

					<div class="col-12">
						<h3>Next Steps</h3>
						<ul>
							<li>Check you have received a copy of this report</li>
							<li>Make sure parents have been notified of the accident and the treatment given</li>
							<li>If you become aware of further treatment being required (a visit to hospital, a doctor, or a dentist) in relation to this accident, headquarters must be notified - <a href="https://scouts.org.uk/contact-us" target="_blank" rel="noreferrer noopener">please contact the Info Centre</a> at the earliest opportunity</li>
							<li>If you later have any information to add to this report, please contact <a href="mailto:X">X</a></li>
						</ul>
					</div>
					<div class="col-12 text-center">
						<a class="btn btn-outline-danger" href="{{ route('accidentForm') }}">Submit another report</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
