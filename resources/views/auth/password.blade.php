<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SPEED BICYCLE</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{ asset('/assets/bootstrap/css/bootstrap.min.css ')}}">
        <link rel="stylesheet" href="{{ asset('/assets/font-awesome/css/font-awesome.min.css ')}}">
		<link rel="stylesheet" href="{{ asset('/assets/css/form-elements.css ')}}">
        <link rel="stylesheet" href="{{ asset('/assets/css/style.css ')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js' )}}"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js' )}}"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{ asset('/assets/ico/favicon.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('/assets/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('/assets/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('/assets/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('/assets/ico/apple-touch-icon-57-precomposed.png') }}">
    
        <!-- Javascript -->
        <script src="{{ asset('/assets/js/jquery-1.11.1.min.js' )}}"></script>
        <script src="{{ asset('/assets/bootstrap/js/bootstrap.min.js' )}}"></script>
        <script src="{{ asset('/assets/bootstrap/js/bootbox.min.js' )}}"></script>
        <script src="{{ asset('/assets/js/jquery.backstretch.min.js' )}}"></script>
        <script src="{{ asset('/assets/js/scripts.js' )}}"></script>
        
        <!--[if lt IE 10]>
            <script src="{{ asset('/assets/js/placeholder.js' )}}"></script>
        <![endif]-->

    </head>

    <body>
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>BICYCLE SPORT</strong> SHOP</h1>
                            <div class="description">
                            	<p style="font-family: 'Calibri'; font-size: 22px;">
	                            	<strong>Shop</strong> and <strong>trade</strong> - in with <strong>CONFIDENCE</strong>
                            	</p>
                            </div>
                        </div>
                    </div>
                    <script>
                    @if (count($errors) > 0)
                        bootbox.alert({
                              message: "@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach",
                              title: "<strong>Whoops!</strong> There were some problems with your input.<br><br>",
                            });
                    @endif
                    </script>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Reset Password</h3>
                            		<p>Enter your email to reset password:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                            	@if (session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
								@endif
			                    <form role="form" method="POST" action="{{ url('/password/email') }}" class="login-form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">E-Mail Address
                                            <span class="required">* </span>
                                        </label>
			                        	<input type="text" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" class="form-username form-control" id="form-username">
			                        </div>
			                        <button type="submit" class="btn">Send Password Reset Link</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>