<!DOCTYPE html>
<html lang="en">
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
        <style type="text/css">
        hr.message-inner-separator
            {
                clear: both;
                margin-top: 10px;
                margin-bottom: 13px;
                border: 0;
                height: 1px;
                background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
                background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
                background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
                background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
            }

        </style>
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{!! URL::to('/') !!}">laravel</a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    
                    @if(Auth::check())
                    <li><a href="{!! URL::to('/addrole') !!}">Addrole</a></li>
                    <li><a href="{!! URL::to('/addper') !!}">AddPermition</a></li>
                    <li><a href="{!! URL::to('/addper_user') !!}">Add Permition to user</a></li>
                    <li><a href="{!! URL::to('/addper_role') !!}">Add permition to role</a></li>
                    @else
                    <li class="active"><a href="{!! URL::to('/signin') !!}">Login</a></li>
                    <li><a href="{!! URL::to('/signup') !!}">Signup</a></li>
                    @endif
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                    <li><a href="">Welcom {{ Auth::user()->name }}</a></li>
                    <li><a href="{!! URL::to('/logout') !!}">Logout</a></li>
                    @endif
                    {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

        <div class="container">
         @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <p>
                           {{ $error }}
                        </p>
                    </div>
                {{-- <div class="alert alert-error">
                    <a class="close" data-dismiss="alert">&times;</a>
                    
                </div> --}}
             @endforeach
        @endif
        @yield('main_container')
        </div>

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html>