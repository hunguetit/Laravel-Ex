<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
<!--/banner-->
<div class="bikes">
<div class="mountain-sec">
		<h2>BIG SALE</h2>
		<div class="timeSale" style="text-align: center">
			<script>
				var days = <?php echo json_encode($week) ?>
			</script>
			<span  id="countdown" class="timer" style='font-weight: 800; font-size: 50px;'></span>
		</div>
		@foreach ($bikes_sales as $bikes_sale)
		<a href="{{ asset('product/'.$bikes_sale->id.'/view') }}">
		 	<div class="bike">
			 	<?php
			 		$images_bikeSale = DB::table('images')->where('images.product_id', '=', $bikes_sale->id)->get();
	            ?>
	            @if ($bikes_sale->sale > 0)
	            <p class="type-discount">- {{$bikes_sale->sale}} %</p>
	            @endif
				<img src="{{ asset($images_bikeSale[0]->name) }}" alt=""/>
		    	<div class="bike-cost">
					<div class="bike-mdl">
						<h4>{{$bikes_sale->name}}<span>{{$bikes_sale->modelNo}}</span></h4>
					</div>
					@if (Auth::check())
					@if (Auth::user()->role == 'user')
					<div class="bike-cart">						 
						<a class="buy" href="{{ asset('user/'.$bikes_sale->id.'/cart') }}">BUY NOW</a>
					</div>
					@endif
					@endif
					<div class="clearfix"></div>
				</div>
				<div class="fast-viw">
					<a href="{{ asset('product/'.$bikes_sale->id.'/view') }}">Quick View</a>
				</div>
			</div>
		</a>
		@endforeach
			 <div class="clearfix"></div>
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
					@if (Auth::check())
					@if (Auth::user()->role == 'user')
					<div class="bike-cart">						 
						<a class="buy" href="{{ asset('user/'.$mountainbike->id.'/cart') }}">BUY NOW</a>
					</div>
					@endif
					@endif
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

	  <div class="mountain-sec">
		<h2>FIXIE BIKES</h2>
		@foreach ($fixiebikes as $fixiebike)
		<a href="{{ asset('product/'.$fixiebike->id.'/view') }}">
		 	<div class="bike">
			 	<?php
			 		$images_fixiebikes = DB::table('images')->where('images.product_id', '=', $fixiebike->id)->get();
	            ?>
	            @if ($fixiebike->sale > 0)
	            <p class="type-discount">- {{$fixiebike->sale}} %</p>
	            @endif
				<img src="{{ asset($images_fixiebikes[0]->name) }}" alt=""/>
		    	<div class="bike-cost">
					<div class="bike-mdl">
						<h4>{{$fixiebike->name}}<span>{{$fixiebike->modelNo}}</span></h4>
					</div>
					@if (Auth::check())
					@if (Auth::user()->role == 'user')
					<div class="bike-cart">						 
						<a class="buy" href="{{ asset('user/'.$fixiebike->id.'/cart') }}">BUY NOW</a>
					</div>
					@endif
					@endif
					<div class="clearfix"></div>
				</div>
				<div class="fast-viw">
					<a href="{{ asset('product/'.$fixiebike->id.'/view') }}">Quick View</a>
				</div>
			</div>
		</a>
		@endforeach
			 <div class="clearfix"></div>
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
					@if (Auth::check())
					@if (Auth::user()->role == 'user')
					<div class="bike-cart">						 
						<a class="buy" href="{{ asset('user/'.$roadbike->id.'/cart') }}">BUY NOW</a>
					</div>
					@endif
					@endif
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



	  <div class="mountain-sec">
		<h2>BALANCE BIKES</h2>
		@foreach ($balancebikes as $balancebike)
		<a href="{{ asset('product/'.$balancebike->id.'/view') }}">
		 	<div class="bike">
			 	<?php
			 		$images_balancebikes = DB::table('images')->where('images.product_id', '=', $balancebike->id)->get();

	            ?>		
	            @if ($balancebike->sale > 0)
	            <p class="type-discount">- {{$balancebike->sale}} %</p> 
	            @endif
				<img src="{{ asset($images_balancebikes[0]->name) }}" alt=""/>
		    	<div class="bike-cost">
					<div class="bike-mdl">
						<h4>{{$balancebike->name}}<span>{{$balancebike->modelNo}}</span></h4>
					</div>
					@if (Auth::check())
					@if (Auth::user()->role == 'user')
					<div class="bike-cart">						 
						<a class="buy" href="{{ asset('user/'.$balancebike->id.'/cart') }}">BUY NOW</a>
					</div>
					@endif
					@endif
					<div class="clearfix"></div>
				</div>
				<div class="fast-viw">
					<a href="{{ asset('product/'.$balancebike->id.'/view') }}">Quick View</a>
				</div>
			</div>
		</a>
		@endforeach
			 <div class="clearfix"></div>
	  </div>
		 <div class="mountain-sec">
		<h2>KID BIKES</h2>
		@foreach ($kidbikes as $kidbike)
		<a href="{{ asset('product/'.$kidbike->id.'/view') }}">
		 	<div class="bike">
			 	<?php
			 		$images_kidbikes = DB::table('images')->where('images.product_id', '=', $kidbike->id)->get();
	            ?>		
	            @if ($kidbike->sale > 0) 
	            <p class="type-discount">- {{$kidbike->sale}} %</p> 
	            @endif
				<img src="{{ asset($images_kidbikes[0]->name) }}" alt=""/>
		    	<div class="bike-cost">
					<div class="bike-mdl">
						<h4>{{$kidbike->name}}<span>{{$kidbike->modelNo}}</span></h4>
					</div>
					@if (Auth::check())
					@if (Auth::user()->role == 'user')
					<div class="bike-cart">					 
						<a class="buy" href="{{ asset('user/'.$kidbike->id.'/cart') }}">BUY NOW</a>
					</div>
					@endif
					@endif
					<div class="clearfix"></div>
				</div>
				<div class="fast-viw">
					<a href="{{ asset('product/'.$kidbike->id.'/view') }}">Quick View</a>
				</div>
			</div>
		</a>
		@endforeach
			 <div class="clearfix"></div>
	  </div>
	 </div>
<!---->
<div class="footer">
@include('users.includes.footer')
</div>
<!---->
</body>
</html>

