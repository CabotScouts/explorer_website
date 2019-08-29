{{-- Ribbon which appears above the navbar --}}
@if(App::environment(['local', 'staging']))
	<div class="container ribbon">
		<div class="row">
			<div class="col col-12">
				<p><b>This version of the website is for testing purposes - information may be inaccurate/incomplete, and links broken.</b><br />If you're not expecting to be here, please try the <a href="https://cabotexplorers.org.uk">main website</a> instead.</p>
			</div>
		</div>
	</div>
@endif
