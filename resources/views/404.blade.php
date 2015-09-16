<!DOCTYPE html>
<html>
<head>
<title>Bike Shop a Ecommerce | Bicycles Sport</title>
@include('users.includes.head')
</head>
<body>
@include('users.includes.script')
<div class="banner-bg banner-sec">	
	  <div class="container">
@include('users.includes.header')
	  </div> 				 
</div>
<div class="404-page">
	 <div class="container">
		 <div class="error-head">
			 <h1>4<label>0</label>4</h1>
			 <span>ERROR</span>
			 <h2>Ooops....!This page is not found.</h2>
			 <a href="{{ URL::previous() }}">Go Back</a>
		 </div>
	 </div>
</div>
<div class="footer">
@include('users.includes.footer')
</div>
</body>
</html>