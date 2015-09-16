@extends('admin.layouts.default')

@section('title','User List Managed')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content" style="min-height:288px">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
			Products List
		</h3>

		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">

				<!-- Begin: life time stats -->
				<div class="portlet">
					<div class="portlet-title">
							<div class="caption">Products
							</div>
							<div class="actions">
								<div class="btn-group" style="width: 300px;">
							</div>
						</div>
					<div class="portlet-body">
						<div class="table-container">

							<div id="datatable_products_wrapper" class="dataTables_wrapper dataTables_extended_wrapper no-footer">
							<div class="table-scrollable">
							<table class="table table-striped table-bordered table-hover dataTable no-footer" id="datatable_users" aria-describedby="datatable_products_info" role="grid">
								<thead>
								<tr role="row" class="heading">
									<th width="3%" class="sorting_asc" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 ID
									</th>
									<th width="15%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Name
									</th>
									<th width="10%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Model Number
									</th>
									<th width="20%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Price
									</th>
									<th width="20%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Sale
									</th>
									<th width="20%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Time Sale
									</th>
									<th width="5%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Description
									</th>
									<th width="15%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Brand
									</th>
									<th width="15%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Category
									</th>
									<th width="15%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Quantity In Stock
									</th>
									<th width="15%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Size
									</th>
									<th width="15%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Image
									</th>
									<th width="15%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Create_at
									</th>
									<th width="5%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 View
									</th>
									<th width="5%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Edit
									</th>
									<th width="5%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Delete
									</th>
								</tr>
								
								</thead>
								<tbody>
								@foreach ($products as $product)
									<tr role="row" class="odd">
										<td class="sorting_1">{{$product->id}}</td>
										<td>{{$product->name}}</td>
										<td>{{$product->modelNo}}</td>
										<td>{{$product->price}}</td>
										<td>{{$product->sale}} %</td>
										<td>{{$product->timeSale}}</td>
										<td class="description">{{$product->description}}</td>
										<td>{{$product->brand}}</td>
										<td>{{$product->categoryName}}</td>
										<td>{{$product->quantityInStock}}</td>
										<td>{{$product->productSize}}</td>
										<td><img src="{{asset($product->imageName)}}" class="avatar" alt="a picture"></td>
										<td>{{$product->created_at}}</td>
										<td><a href="{{asset('admin/product/'.$product->id.'/view')}}" class="btn btn-sm green" id="my-button"><i class="fa fa-eye"></i></a></td>
										<td><a href="{{asset('admin/product/'.$product->id.'/edit')}}" class="btn btn-sm yellow"><i class="fa fa-pencil"></i></a></td>
										<td><a href="{{asset('admin/product/delete/'.$product->id)}}" class="btn btn-sm red"><i class="fa fa-times"></i></a></td>
									</tr>
								@endforeach
								</tbody>
								</table></div></div>

		</div>
		</div>
		</div>
<!-- End: life time stats -->
</div>
</div>
<!-- END PAGE CONTENT-->
</div>
</div>

@stop

@section('script')

<script type="text/javascript">
    $(document).ready(function() {
     
        $(".description").shorten();
     
    });
</script>
<script>
	$(document).ready(function() {
    $('#datatable_users').dataTable();
} );
</script>
<script>
$(document).ready(function() {

            // Binding a click event
            // From jQuery v.1.7.0 use .on() instead of .bind()
            $('#my-button').bind('click', function(e) {
                e.preventDefault();
                $('#element_to_pop_up').bPopup();
            });

            $('#my_popup_close').bind('click', function(e) {
                e.preventDefault();
                $('#element_to_pop_up').none();
            });

        });
</script>
<style type="text/css" media="screen">
	#element_to_pop_up { display:none; }
</style>
@stop