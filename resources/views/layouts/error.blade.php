<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>	

@extends('base')
@include('components.user')
<div class="container">
<br><br><br>
<div class="col-md-10 col-lg-10">
	@if (session('errors'))
		<h1 class="alert alert-danger" align="center">
			<i class="fas fa-exclamation-triangle">
			{{session('errors')->first('Error1')}}
		</h1>
	@endif
</div>
</div>