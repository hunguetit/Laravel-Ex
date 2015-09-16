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
		<h2>ROAD BIKES</h2>
		@foreach ($roadbikes as $roadbike)
		<a href="{{ asset('product/'.$roadbike->id.'/view') }}">
		 	<div class="bike">
			 	<?php
			 		$images_roadbikes = DB::table('images')->where('images.product_id', '=', $roadbike->id)->get();
	            ?>		
	            @if ($roadbike->sale > 0)
	            <p class="type-discount">- {{$roadbike->sale}} %</p>
	            @endif 
				<img src="{{ asset($images_roadbikes[0]->name) }}" alt=""/>
		    	<div class="bike-cost">
					<div class="bike-mdl">
						<h4>{{$roadbike->name}}<span>{{$roadbike->modelNo}}</span></h4>
					</div>
					<div class="bike-cart">						 
						<a class="buy" href="{{ asset('product/'.$roadbike->id.'/view') }}">BUY NOW</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="fast-viw">
					<a href="{{ asset('product/'.$roadbike->id.'/view') }}">Quick View</a>
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

