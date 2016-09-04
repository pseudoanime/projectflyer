@extends('layouts')

@section('content')

	<h1>Selling Your Home?</h1>

	<hr>

	<div class="row">

		@if(count($errors)) 
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif

		{!! Form::open(array('url' => 'flyers', "enctype" => "multipart/form-data", "class" => "col-md-6")) !!}

			@include('flyers.form')
	    
		{!! Form::close() !!}

	</div>


@stop