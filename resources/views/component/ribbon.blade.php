{{-- Ribbon which appears above the navbar --}}
@if(App::environment(['local', 'staging']))
	<div class="ribbon">
		<div class="container grid-lg">
			<div class="col-12">
				<p><b>
					This version of the website is for testing purposes - information may be inaccurate/incomplete, and links broken.
				</b></p>
				<p>
					If you're not expecting to be here, please try the <a href="https://cabotexplorers.org.uk">main website</a> instead.
				</p>
			</div>
		</div>
	</div>
@endif
