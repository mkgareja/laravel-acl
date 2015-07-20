@extends('template')
@section('main_container')
			<span class="label label-info">Welcome {{ $user_new['name'] }}</span>
			@if($user_new['role']=='admin')
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Admin</strong>only admin allow here.!!!!!!!!!!<br/>
					<strong>Permition :: </strong>{{ $user_new['permition'] }}
				</div>
			@else
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>forum moderator</strong>only forum moderator allow here.!!!!!!!!!!<br/>
					<strong>Permition  : </strong>{{ $user_new['permition'] }}
				</div>
			@endif	
		
		<a class="btn btn-sm btn-default" href="{{ URL::to('/signup')}}" role="button">Home Page</a>
@endsection