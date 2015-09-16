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
                    
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<h1 style="color: white;">Hi, {{ Auth::user()->name }}</h1>
                        	<p style="color: white;">Bạn đã kích hoạt thành công tài khoản trên BICYCLE SPORT</p>
                        	<p>Bạn ấn vào <a href="{{asset('/home')}}">đây</a> để về quay về trang chủ</p>
                        </div>
                    </div>
                   
                    
                </div>
            </div>
            
        </div>


    </body>

</html>