@extends('template')
@section('main_container')
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<a class="btn btn-sm btn-default" href="{!! URL::to('/signup')!!}" role="button">Resister</a><br/><br/>
		{!! Form::open(array('url' => 'authenticate'))!!}
			<legend>SignIn</legend>
			<div class="form-group">
				<label for="">Enter Email</label>
				<input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">
			</div>
			<div class="form-group">
				<label for="">Enter Password</label>
				<input type="text" class="form-control" name="password" id="password" placeholder="Enter Password">
			</div>
			

			<button type="submit" class="btn btn-primary">Submit</button>
		{!! Form::close() !!}
	</div>	
@endsection