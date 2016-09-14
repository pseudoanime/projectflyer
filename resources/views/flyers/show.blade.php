@extends('layouts')

@section('content')

	<div class="row">

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		
			<h1>{{$flyer->street}}</h1>

			<h2>{!!$flyer->price !!}</h2>

			<hr>

			<div class="description">
				{!! nl2br($flyer->description)!!}
			</div>

		</div>

		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 gallery">

			@foreach($flyer->photos->chunk(4) as $set)
				<div class="row">
					@foreach($set as $photo)
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 gallery-image">
							<img src="{{Request::root()}}\{{$photo->thumbnail_path}}">
						</div>
					@endforeach
				</div>
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