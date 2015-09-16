@extends('admin.layouts.default')

@section('title','User List Managed')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content" style="min-height:288px">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
			Orders List
		</h3>

		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">

				<!-- Begin: life time stats -->
				<div class="portlet">
					<div class="portlet-title">
							<div class="caption">Orders
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
									<th width="25%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Customer Name
									</th>
									<th width="10%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Phone Number
									</th>
									<th width="3%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Address
									</th>
									<th width="15%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Required Date
									</th>
									<th width="15%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Total Price
									</th>
									<th width="15%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Status
									</th>
									<th width="15%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Create_at
									</th>
									<th width="5%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 View
									</th>
								</tr>
								
								</thead>
								<tbody>
								@foreach ($orders as $order)
									<tr role="row" class="odd">
										<td>{{$order->customerName}}</td>
										<td>{{$order->phone}}</td>
										<td>{{$order->address}}</td>
										<td>{{$order->requiredDate}}</td>
										<td>$ {{$order->totalPrice}}</td>
										@if ($order->status == '1')
											<td><span class="label label-sm label-success">Shipped</span></td>
										@else
											<td><span class="label label-sm label-warning">In Stock</span></td>
										@endif
										<td>{{$order->created_at}}</td><td><a href="{{asset('admin/order/'.$order->id.'/view')}}" class="btn btn-sm green" id="my-button"><i class="fa fa-eye"></i></a></td>
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
@stop