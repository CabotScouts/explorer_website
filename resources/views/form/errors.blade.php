<div class="alert alert-danger">
	<strong>Please check you've correctly filled in the required information</strong>
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
