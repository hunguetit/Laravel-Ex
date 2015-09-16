<!DOCTYPE html>
<html>
<head>
<title>Bike Shop a Ecommerce | Bicycles Sport</title>
@include('users.includes.head')
@include('admin.includes.head')
</head>
<body>
@include('users.includes.script')
@include('admin.includes.script')
<div class="banner-bg banner-sec">	
	  <div class="container">
@include('users.includes.header')
	  </div> 				 
</div>
<!--/banner-->
<!-- BEGIN CONTENT -->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row margin-top-20">
				<div class="col-md-12">
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<ul class="nav nav-tabs">
											<li>
												<a href="{{asset('profile/'. Auth::user()->id )}}">Personal Info</a>
											</li>
											<li class="active">
												<a href="{{asset('user/'. Auth::user()->id .'/edit')}}" >Change Personal Info</a>
											</li>
											<li>
												<a href="{{asset('user/'. Auth::user()->id .'/edit_avatar')}}" >Change Avatar</a>
											</li>
											<li>
												<a href="{{asset('user/'. Auth::user()->id .'/edit_password')}}">Change Password</a>
											</li>
										</ul>
									</div>
									<script>
				                    @if (count($errors) > 0)
				                        bootbox.alert({
				                              message: "@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach",
				                              title: "<strong>Whoops!</strong> There were some problems with your input.<br><br>",
				                            });
				                    @endif
				                    </script>
									<div class="portlet-body">
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane active" id="tab_1_2">
												<form role="form" action="{{asset('user/'. Auth::user()->id .'/edit')}}" method="POST">
													{!! csrf_field() !!}
													<div class="form-group">
														<label class="control-label">Fullname</label>
														<input type="text" class="form-control" value="{{$user->name}}" name="name"/>
													</div>
													<div class="form-group">
														<label class="control-label">Username</label>
														<input type="text" name='username' class="form-control" value="{{$user->username}}"/>
													</div>
													<div class="form-group">
														<label class="control-label">Email</label>
														<input type="text" class="form-control" name='email' value="{{$user->email}}"/>
													</div>
													<div class="margiv-top-10">
														<button class="btn green-haze">
														Save Changes </button>
													</div>
												</form>
											</div>
											<!-- END PERSONAL INFO TAB -->


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
</div>
</div>
<!---->

</body>
</html>