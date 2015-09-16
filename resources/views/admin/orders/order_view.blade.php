@extends('admin.layouts.default')

@section('title','User List Managed')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content" style="min-height:288px">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

		<!-- BEGIN PAGE HEADER-->
		
<div class="row">
			<div class="col-md-12">
		<div class="portlet-title">
				Customer: <p style="font-weight: 700;">{{$orders[0]->customerName}}</p>
				Address: <p style="font-weight: 700;">{{$orders[0]->address}}</p>
				Phone Number: <p style="font-weight: 700;">{{$orders[0]->phone}}</p>
				TotalPrice: <p style="font-weight: 700;">$ {{$orders[0]->totalPrice}}</p>

				<div class="actions">
					<div class="btn-group" style="width: 300px;">
				</div>
			</div>
		</div>
		</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">

				<!-- Begin: life time stats -->
				<div class="portlet">

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
									<th width="25%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										Product Name
									</th>
									<th width="10%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Model Number
									</th>
									<th width="5%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Quantity
									</th>
									<th width="5%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Size
									</th>
								</tr>
								
								</thead>
								<tbody>
								@foreach ($orders as $order)
									<tr role="row" class="odd">
										<td class="sorting_1">{{$order->id}}</td>
										<td>{{$order->productName}}</td>
										<td>{{$order->productModelNo}}</td>
										<td>{{$order->quantity}}</td>
										<td>{{$order->size}}</td>
									</tr>
								@endforeach
								</tbody>
								</table></div></div>

		</div>
		</div>
<input type="button" id="print_button" value="Print This Order" onclick="this.style.display ='none'; window.print()" />
		</div>
<!-- End: life time stats -->
</div>
</div>
    <div class="row">
            <div class="col-md-12">
            <form action="{{asset('admin/order/'.$order->order_id.'/view')}}" roll='form' method="POST">
                {!! csrf_field() !!}
                <div class="portlet">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="portlet-body">
                        <div class="tabbable">
                            <div class="tab-content no-space">
                                <div class="tab-pane active" id="tab_general">
                                    <div class="form-body">
                                        <div class="form-group style-group-edit">
                                            <label class="col-md-2 control-label">Shipped
                                                <span class="required">* </span>
                                            </label>
                                            @if ($orders[0]->status == '1')
                                            <div class="col-md-10">
                                                <input onclick="this.checked=!this.checked;" type="checkbox" class="form-control" name="shipped" checked="checked">
                                            </div>
                                            @else
                                            @if ($orders[0]->status == '0')
                                            <div class="col-md-10">
                                                <input type="checkbox" class="form-control" name="shipped">
                                            </div>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                <br></br>
            </div>
            <button type="submit" class="btn" style="float: right; margin-right: 10px;">UPDATE</button>
            </div>

            </div>
        </div>
    </div>
    </form>
            </div>
        </div>
<!-- END PAGE CONTENT-->
</div>
</div>

@stop
@section('script')
@stop