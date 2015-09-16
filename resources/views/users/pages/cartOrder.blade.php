<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Bike Shop a Ecommerce | Cart </title>
@include('users.includes.head')
@include('users.includes.script')
<!--js-->

</head>
<body>
<!--banner-->
<div class="banner-bg banner-sec">  
      <div class="container">
 @include('users.includes.header')
      </div>                 
</div>
<!--/banner-->
<div class="cart">
    <div class="row">
    <div class="col-sm-6 col-sm-offset-3 form-box">
        <h1 style="color: white;">Hi, {{ $name }}</h1>
        <p style="color: white;">Thanks you for ordering at Bicycle Sport Shop!</p>
        <p style="color: white;"></p>
    </div>
</div>
</div>
<div class="footer">
@include('users.includes.footer')
</div>

</body>
</html>