@extends('admin.layouts.default')

@section('title','User List Managed')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content" style="min-height:288px">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
		
		<!-- /.modal -->

		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
			Users List
		</h3>

		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">

				<!-- Begin: life time stats -->
				<div class="portlet">
					<div class="portlet-title">
							<div class="caption">
								Users
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
										 Username
									</th>
									
									<th width="20%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Email
									</th>

									<th width="5%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Avatar
									</th>
									<th width="20%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
										 Status
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
								@foreach ($users as $user)
									<tr role="row" class="odd">
										<td class="sorting_1">{{$user->id}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->username}}</td>
										<td>{{$user->email}}</td>
										<td><img src="{{asset($user->avatar)}}" class="avatar" alt="a picture"></td>
										@if ($user->status == 'active')
											<td><span class="label label-sm label-success">{{$user->status}}</span></td>
										@else
											<td><span class="label label-sm label-warning">{{$user->status}}</span></td>
										@endif
										<td>{{$user->created_at}}</td>
										@if($user->role == 'admin')
											<td><a href="{{asset('admin/users_list/'.$user->id.'/profile')}}" class="btn btn-sm green"><i class="fa fa-eye"></i></a></td>
											<td></td>
											<td></td>
										@else
											<td><a href="{{asset('admin/users_list/'.$user->id.'/profile')}}" class="btn btn-sm green"><i class="fa fa-eye"></i></a></td>
											<td><a href="{{asset('admin/users_list/'.$user->id.'/edit')}}" class="btn btn-sm yellow"><i class="fa fa-pencil"></i></a></td>
											<td><a href="{{asset('admin/users_list/'.$user->id.'/delete')}}" class="btn btn-sm red"><i class="fa fa-times"></i></a></td>
										@endif
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
<script>
	$(document).ready(function() {
    $('#datatable_users').dataTable();
} );
</script>
@stop