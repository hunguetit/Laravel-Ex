<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Bike Shop a Ecommerce | Mountain Bikes</title>
@include('users.includes.head')
</head>
<body>
@include('users.includes.script')
<div class="banner-bg banner-sec">	
	  <div class="container">
@include('users.includes.header')
	  </div> 				 
</div>
<!--/banner-->
<div class="parts">
	 <div class="container">
		<h2>MOUNTAIN BIKES</h2>
		<div class="bike-parts-sec">
			<div class="rsidebar span_1_of_left">
				 @include('users.pages.bikes.sidebar')
			</div>
		<div class="mountain-sec">
		<h2>MOUNTAIN BIKES</h2>
		@foreach ($mountainbikes as $mountainbike)
		<a href="{{ asset('product/'.$mountainbike->id.'/view') }}">
		 	<div class="bike">
			 	<?php
			 		$images_mountainbikes = DB::table('images')->where('images.product_id', '=', $mountainbike->id)->get();
	            ?>
	            @if ($mountainbike->sale > 0)
	            <p class="type-discount">- {{$mountainbike->sale}} %</p>
	            @endif	 
				<img src="{{ asset($images_mountainbikes[0]->name) }}" alt=""/>
		    	<div class="bike-cost">
					<div class="bike-mdl">
						<h4>{{$mountainbike->name}}<span>{{$mountainbike->modelNo}}</span></h4>
					</div>
					<div class="bike-cart">						 
						<a class="buy" href="{{ asset('product/'.$mountainbike->id.'/view') }}">BUY NOW</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="fast-viw">
					<a href="{{ asset('product/'.$mountainbike->id.'/view') }}">Quick View</a>
				</div>
			</div>
		</a>
		@endforeach
			 <div class="clearfix"></div>
	  </div>
		</div>
	</div>
</div>
<!---->
<div class="footer">
@include('users.includes.footer')
</div>
<!---->
</body>
</html>

