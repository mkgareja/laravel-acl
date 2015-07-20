@extends('template')
@section('main_container')
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<a class="btn btn-sm btn-default" href="{!! URL::to('/signin')!!}" role="button">Login</a><br/><br/>
			{!! Form::open(array('url' => 'save' )) !!}
				<legend>Signup</legend>
			
				<div class="form-group">
					<label for="">Enter Name</label>
					<input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required="required">
				</div>
				<div class="form-group">
					<label for="">Enter Email</label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Enter email" required="required">
				</div> 
				<div class="form-group">
					<label for="">Enter Password</label>
					<input type="text" class="form-control" name="password" id="password" placeholder="Enter Password" required="required">
				</div>
				<div class="form-group">
					<label for="">Role</label>
					<select name="role" id="role" class="form-control" required="required">
					@foreach ($role as $role)
						<option value="{{ $role->id }}">{{ $role->name }}</option>
					@endforeach	
					</select>
				</div>
			
				<button type="submit" class="btn btn-primary">Submit</button>
			{!! Form::close() !!}
		</div>	
@endsection