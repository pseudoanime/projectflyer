<div class="form-group">
	<label for="street">Street:</label>
	<input type="text" name="street" class="form-control" value="{{old('street')}}" required>
</div>	

<div class="form-group">
	<label for="city">City:</label>
	<input type="text" name="city" class="form-control" value="{{old('city')}}" required>
</div>	

<div class="form-group">
	<label for="postcode">Zip/Postal Code:</label>
	<input type="text" name="postcode" class="form-control" value="{{old('postcode')}}" required>
</div>	

<div class="form-group">
	<label for="country">Country</label>
	<select id="country" name="country" class="form-control">
		@foreach(App\Http\Utilities\Country::all() as $name =>$code)
			<option value="{{$code}}">{{$name}}</option>
		@endforeach
	</select>
</div>	

<div class="form-group">
	<label for="state">State</label>
	<input type="text" name="state" class="form-control" value="{{old('state')}}" required>
</div>	

<div class="form-group">
	<label for="price">Sale Price</label>
	<input type="text" name="price" class="form-control" value="{{old('price')}}" required>
</div>	

<div class="form-group">
	<label for="description">Home Description</label>
	<textarea type="text" name="description" class="form-control" value="{{old('description')}}" rows="10" required></textarea>
</div>	

{!! Form::submit("Submit",array('class' => "btn btn-primary"))!!}