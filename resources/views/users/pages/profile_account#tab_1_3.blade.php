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
											<li>
												<a href="{{asset('user/'. Auth::user()->id .'/edit')}}" >Change Personal Info</a>
											</li>
											<li class="active">
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
											
											<!-- CHANGE AVATAR TAB -->
											<div class="tab-pane active" id="tab_1_3">
												<p>
													 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
												</p>
												<form action="{{ asset('user/'.Auth::user()->id.'/edit_avatar') }}" roll='form' method="POST" enctype="multipart/form-data">
													{!! csrf_field() !!}
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																<img src="{{ asset(Auth::user()->avatar) }}" alt=""/>
															</div>
															<div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Select image </span>
																<span class="fileinput-exists">
																Change </span>
																<input type="file" name="avatar">
																</span>
															</div>
														</div>
													</div>
													<div class="margin-top-10">
														<button class="btn green-haze">
														Submit </button>
													</div>
												</form>
											</div>
											<!-- END CHANGE AVATAR TAB -->
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