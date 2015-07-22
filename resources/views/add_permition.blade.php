@extends('template')
@section('main_container')
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	<legend>Permissions</legend>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Role Id</th>
				<th>Role Name</th>
				<th>Role Slug</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($per as $per)
			<tr>
				<td>{{ $per->id }}</td>
				<td>{{ $per->name}}</td>
				<td>{{ $per->slug}}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
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