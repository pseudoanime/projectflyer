@extends('layouts')

@section('content')

	<h1>Selling Your Home?</h1>

	<hr>

	@if(count($errors)) 
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::open(array('url' => 'flyer', "enctype" => "multipart/form-data")) !!}

		@include('flyers.form')
    
	{!! Form::close() !!}



@stop