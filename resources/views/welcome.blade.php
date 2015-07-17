<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                @if (session('status'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
                    
                    </div>
                @endif
                <div class="title">Welcome @if(isset($email)){{ $email }}@endif</div>
            </div>
        </div>
    </body>
</html>
