@extends('admin.layouts.default')

@section('title','User List Managed')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content" style="min-height:288px">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

		<!-- BEGIN PAGE HEADER-->
		

		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">

				<!-- Begin: life time stats -->
				<div class="portlet">
					<div class="portlet-title">
								<h3 style="float: left;" class="page-title">
									Products View
								</h3>
					</div>
					<div class="portlet-body">
						<div class="details-left-slider">
							 <div class="grid images_3_of_2">
							  <ul id="etalage">
							  	@foreach ($images as $image)
								<li>
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
								<p><label>$ {{$product[0]->price}}</label><a href="#">Click for offer</a></p>
								@else
								<p style="color: black"><label><del>$ {{$product[0]->price}}</del></label></p>
								<p><label>$ {{$product[0]->price * ((100-$product[0]->sale)/100)}}</label><a href="#">Click for offer</a></p>
								@endif	
								
								<p class="size">SIZE ::</p>
								@foreach ($sizes as $size)
									<a class="length" href="#">{{$size}}</a>
								@endforeach
								<div class="bike-type">
								<p>TYPE  ::<a href="#">{{$product[0]->categoryName}}</a></p>
								<p>BRAND  ::<a href="#">{{$product[0]->brand}}</a></p>
								</div>
								<h5>Description  ::</h5>
								<p class="desc">{{$product[0]->description}}</p>
						 </div>
						 <div class="clearfix"></div>
					</div>
<!-- End: life time stats -->
				</div>
			</div>
<!-- END PAGE CONTENT-->
		</div>
</div>

@stop

@section('script')

@stop