@extends('users.layouts.defaults')

@section('title','Sport Bike Shop')

@section('content')

<div id="cate" class="categories">
	 <div class="container">
		 <h3>CATEGORIES</h3>
		 <div class="categorie-grids">
		 	@foreach ($categories as $categorie)
			 <a href="{{ asset('bike')}}"><div class="col-md-4 cate-grid grid1">
				 <h2 style="text-transform: uppercase">{{ $categorie->name }}</h2>
				 <p>{{ $categorie->description }}</p>
				 <a class="store" href="{{ asset('bike')}}">GO TO STORE</a>
			 </div></a>
			 @endforeach
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>

<!--bikes-->
<div class="bikes">	
		 <h3>POPULAR BIKES</h3>
		 <div class="bikes-grids">			 
			 <ul id="bicycles">
			 	@foreach ($products as $product)
				 <li>
				 	@if ($product->sale > 0)
		            <p class="type-discount">- {{$product->sale}} %</p>
		            @endif
					 <img src="{{ asset($product->imageName) }}" alt=""/>
					 <div class="bike-info">
						 <div class="model">
							 <h4>{{ $product->name }}<span>{{ $product->price }}</span></h4>							 
						 </div>
						 <div class="model-info">
							 <a href="{{ asset('product/'.$product->id.'/view') }}">BUY</a>
						 </div>						 
						 <div class="clearfix"></div>
					 </div>
					 <div class="viw">
						<a href="{{ asset('product/'.$product->id.'/view') }}">Quick View</a>
					 </div>
				 </li>
				@endforeach
		    </ul>
				 
	</div>
</div>
@stop