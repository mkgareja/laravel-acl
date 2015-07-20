@extends('template')
@section('main_container')
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		{!! Form::open(array('url' => 'saverole' )) !!}
			<legend>Add role</legend>
		
			<div class="form-group">
				<label for="">Role</label>
				<input type="text" class="form-control" id="role" name="role" placeholder="role name" required="required">
			</div>
			<div class="form-group">
				<label for="">Role Slug</label>
				<input type="text" class="form-control" id="role_slug" name="role_slug" placeholder="role slug" required="required">
			</div>
			<div class="form-group">
				<label for="">Enter Level</label>
				<select name="level" id="level" class="form-control">
				@for($i=0; $i <= 10; $i++)
					<option value="{{ $i }}">{{ $i }}</option>
				@endfor
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		{!! Form::close() !!}
		</div>
@endsection