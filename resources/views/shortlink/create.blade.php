@extends('layouts.main')
@section('title', "Shortlinks")
@section('content')
@include('component.alerts')
  <section class="page container pad space">
    <div class="row">
      <div class="col col-12">
        <h1>Make a new Shortlink</h1>
      </div>

      <div class="page-content col col-6 mt-3">
        <form method="post" action="{{ route('shortlink.create.store') }}" novalidate>
					@csrf

					@if($errors->any())
					<div class="row mt-2">
						<div class="col-12">
								@include('form.errors')
						</div>
					</div>
					@endif

					<div class="form-group row">
						<label for="url" class="col-sm-2 col-form-label">URL*</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="url" id="url" placeholder="https://" required />
            </div>
					</div>

          <div class="form-group row">
						<label for="code" class="col-sm-2 col-form-label">Short Code</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="code" id="code" />
            </div>
					</div>

            <div class="form-group row">
							<input class="form-control btn btn-outline-primary" type="submit" name="submit" value="Create Shortlink" />
						</div>
					</div>
				</form>
      </div>
    </div>
  </section>
@endsection
