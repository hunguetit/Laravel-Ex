@extends('admin.layouts.default')

@section('title','User Managed')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content" style="min-height:288px">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

		<h3 class="page-title">
			User Edit
		</h3>

		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">
			<form action="{{ asset('admin/users_list/'.$user->id.'/edit') }}" roll='form' method="POST" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<div class="portlet">
					<script>
                    @if (count($errors) > 0)
                        bootbox.alert({
                              message: "@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach",
                              title: "<strong>Whoops!</strong> There were some problems with your input.<br><br>",
                            });
                    @endif
                    </script>
					<div class="portlet-body">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#" data-toggle="tab">User: {{$user->username}}</a>
								</li>							
							</ul>
							<div class="tab-content no-space">
								<div class="tab-pane active" id="tab_general">
									<div class="form-body">

										<div class="form-group style-group-edit">
											<label class="col-md-2 control-label">Name: 
												<span class="required">* </span>
											</label>
											<div class="col-md-10">
												<input type="text" class="form-control" name="name" value="{{$user->name}}">
											</div>
										</div>

										<div class="form-group style-group-edit">
											<label class="col-md-2 control-label">Username: 
												<span class="required">* </span>
											</label>
											<div class="col-md-10">
												<input type="text" class="form-control" name="username" value="{{$user->username}}">
											</div>
										</div>

										<div class="form-group style-group-edit">
											<label class="col-md-2 control-label">Email: 
												<span class="required">* </span>
											</label>
											<div class="col-md-10">
												<input type="text" class="form-control" name="email" value="{{$user->email}}">
											</div>
										</div>

										<div class="form-group style-group-edit">
											<label class="col-md-2 control-label">Avatar: 
												<span class="required">* </span>
											</label>
											<div class="col-md-10">
												<div>
													<img src="{{asset($user->avatar)}}" class="avatar" alt="a picture">
												</div>
												<input type="file" class="form-control" name="avatar">
											</div>
										</div>
									</div>
								</div>
							<button type="submit" class="btn">SUBMIT</button>
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