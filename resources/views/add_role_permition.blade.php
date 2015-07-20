@extends('template')
@section('main_container')
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		{!! Form::open(array('url' => 'savepermition_role' )) !!}
			<legend>Add Permission to Role</legend>
		
			<div class="form-group">
				<label for="">Role</label>
				<select name="role" id="role" class="form-control">
				@foreach ($role as $role): ?>
				<option value="{{ $role->id }}">{{ $role->name }}</option>
				@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="">Attach Permition</label>
				<select name="permition" id="permition" class="form-control">
				@foreach ($permition as $permition): ?>
				<option value="{{ $permition->id }}">{{ $permition->name }}</option>
				@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		{!! Form::close() !!}
		</div>
@endsection
		