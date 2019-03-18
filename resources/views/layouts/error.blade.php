<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>	

@include('base')
@include('components.user')
<div class="container">
<br><br><br>
	
	@if (session('errors'))
		<h1 class="alert alert-danger" align="center">
			{{session('errors')->first('Error')}}

		</h1>
	@endif
	
</div>