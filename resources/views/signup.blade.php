<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="container">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
	</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>