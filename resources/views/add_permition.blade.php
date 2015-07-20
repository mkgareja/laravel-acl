@extends('template')
@section('main_container')
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		{!! Form::open(array('url' => 'savepermition' )) !!}
			<legend>Add Permission</legend>
			
			<div class="form-group">
				<label for="">Permission</label>
				<input type="text" class="form-control" id="permition" name="permition" placeholder="Permission name" required="required">
			</div>
			<div class="form-group">
				<label for="">Permission Slug</label>
				<input type="text" class="form-control" id="permition_slug" name="permition_slug" placeholder="role slug" required="required">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		{!! Form::close() !!}
		</div>
@endsection