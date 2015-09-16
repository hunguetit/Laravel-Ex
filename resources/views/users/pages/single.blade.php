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
@include('users.includes.script')
</head>
<body>

<div class="banner-bg banner-sec">	
	  <div class="container">
@include('users.includes.header')
	  </div> 				 
</div>
<!--/banner-->
<div class="product">
	 <div class="container">
		 <div class="ctnt-bar cntnt">
			 <div class="content-bar">
				 <div class="single-page">
						<!--//details-product-slider-->
					 <div class="details-left-slider">

						 <div class="grid images_3_of_2">

						  <ul id="etalage">
							@foreach ($images as $image)
								<li>
									@if ($product[0]->sale > 0)
						            <p class="type-discount">- {{$product[0]->sale}} %</p>
						            @endif
									<img class="etalage_thumb_image" src="{{asset($image)}}" class="img-responsive"  />
									<img class="etalage_source_image" src="{{asset($image)}}"class="img-responsive"  />
								</li>
							@endforeach
						</ul>
						</div>
					 </div>
					 <div class="details-left-info">

					 	<h3>{{$product[0]->name}}</h3>
							<h4>Model No: {{$product[0]->modelNo}}</h4>
						<h4></h4>

						@if ($product[0]->sale == 0)
						<p><label>$ {{round($product[0]->price, 2)}}</label></p>
						@else
						<p style="color: black; font-size: 20px">Old Price:<del> $ {{round($product[0]->price, 2)}}</del></p>
						<p style="font-size: 50px"><label>$ {{round($product[0]->price * ((100-$product[0]->sale)/100), 2)}}</label></p>
						@endif	
						</br>
						<h5>Description  ::</h5>
						<p class="desc">{{$product[0]->description}}</p>

						<div class="btn_form">
							<a href="{{ asset('user/'.$product[0]->id.'/cart') }}">ADD TO CART</a>
						</div>
						<div class="bike-type">
							<p>TYPE  ::<a href="#">{{$product[0]->categoryName}}</a></p>
							<p>BRAND  ::<a href="#">{{$product[0]->brand}}</a></p>
						</div>
					 </div>
					 <div class="clearfix"></div>				 	
				  </div>
			  </div>
		  </div>
		  
           @if($posts)
           <h3>Comments.....</h3>
			<div class="comment-block">
           @foreach ($posts as $post)
           <div class="comment-item "style="width: 1000px">
				<div class="comment-avatar">
					<img src="{{ asset($post->avatar) }}" alt="avatar">
				</div>
				<div class="comment-post" >
					<h3>{{$post->username}} <span>said....</span></h3>
					<p>{{$post->comment}}</p>
				</div>
			</div>
           @endforeach
       </div>
           @endif
		  <div class="col-md-12" style="background-color: white;" >
		  	<form id="form" method="post" action="{{ url('/user/comment/post/' .$product[0]->id) }}">
			<!-- need to supply post id with hidden fild -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label style="width: 1000px">
				<span>Your comment *</span>
				<textarea name="comment" id="comment" cols="50" rows="10" placeholder="Type your comment here...." required></textarea>
			</label>
			<input type="submit" id="submit" value="Submit Comment" style="width: 1000px; background: rgb(150, 150, 150)">
		</form>
		  </div>
		  <div class="single-bottom2">
			  <h6>Related Products</h6>
			 <div class="product">
			 	@foreach ($related_products as $related_product)
					 <div class="product-desc">
						  <div class="product-img product-img2">
						  	@if ($related_product->sale > 0)
				            <p class="type-discount">- {{$related_product->sale}} %</p>
				            @endif
						  	<a href="{{ asset('product/'.$related_product->id.'/view') }}"><img src="{{ asset($related_product->imageName) }}" class="img-responsive " alt=""/></a>
						 </div>
						 <div class="prod1-desc">
								<h5><a class="product_link" href="{{ asset('product/'.$related_product->id.'/view') }}">{{ $related_product->name }}</a></h5>
								<p class="product_descr">{{ $related_product->description }}</p>									
						 </div>
						 <div class="clearfix"></div>
					 </div>
					 <div class="product_price">
													
							<a class="button1" href="{{ asset('user/'.$related_product->id.'/cart') }}"><span>Add to cart</span></a>
					 </div>
						<div class="clearfix"></div>
					@endforeach
			 </div>
		 </div>
		 <div class="single-bottom2">
			  <h6>Newest Products</h6>
			 <div class="product">
			 	@foreach ($newest_products as $newest_product)
					 <div class="product-desc">
						  <div class="product-img product-img2">
						  	@if ($related_product->sale > 0)
				            <p class="type-discount">- {{$newest_product->sale}} %</p>
				            @endif
							 <a href="{{ asset('product/'.$newest_product->id.'/view') }}"><img src="{{ asset($newest_product->imageName) }}" class="img-responsive " alt=""/></a>
						 </div>
						 <div class="prod1-desc">
								<h5><a class="product_link" href="{{ asset('product/'.$newest_product->id.'/view') }}">{{ $newest_product->name }}</a></h5>
								<p class="product_descr">{{ $newest_product->description }}</p>									
						 </div>
						 <div class="clearfix"></div>
					 </div>
					 <div class="product_price">						
							<a class="button1" href="{{ asset('user/'.$newest_product->id.'/cart') }}"><span>Add to cart</span></a>
					 </div>
						<div class="clearfix"></div>
					@endforeach
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