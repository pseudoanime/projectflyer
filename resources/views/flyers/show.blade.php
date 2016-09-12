@extends('layouts')

@section('content')

	<div class="row">

		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			
		
			<h1>{{$flyer->street}}</h1>

			<h2>{!!$flyer->price !!}</h2>

			<hr>

			<div class="description">
				{!! nl2br($flyer->description)!!}
			</div>

		</div>

		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">

			@foreach($flyer->photos as $photo)

				<img src={{$photo->path}}>

			@endforeach
			
		</div>

	</div>

	<h2>Add your photos</h2>

	{!! Form::open(array("url" => "/$flyer->postcode/$flyer->street/photos", 'class' => 'dropzone', 'id' => "addPhotosForm")) !!}

		{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}


	{!! Form::close() !!}

@stop

@section('scripts.footer')

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

	<script type="text/javascript">
		Dropzone.options.addPhotosForm = {
			paramName : "photo",
			maxFileSize : 2,
			acceptedFiles : '.jpg, .jpeg, .png, .bmp'
		}
	</script>

@stop