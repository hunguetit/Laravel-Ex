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
											<li class="active">
												<a href="{{asset('profile/'. Auth::user()->id )}}">Personal Info</a>
											</li>
											<li>
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
									<div class="portlet-body">
										<div class="tab-content">
											<div class="tab-pane active" id="tab_1_1">
												<div class="row">
													<div class="col-md-3">
														<ul class="list-unstyled profile-nav">
															<li>
																<img src="{{ asset(Auth::user()->avatar) }}" class="img-responsive" alt=""/>
															</li>
														</ul>
													</div>
													<div class="col-md-9">
														<div class="row">
															<div class="col-md-8 profile-info">
																<h1>{{ Auth::user()->name }}</h1>
																<ul class="list-inline">
																	<li>
																		<i class="fa fa-user"></i> {{ Auth::user()->username }}
																	</li>
																	<li>
																		<i class="fa fa-envelope"></i> {{ Auth::user()->email }}
																	</li>
																	<li>
																		<i class="fa fa-bolt"></i> {{ Auth::user()->role }}
																	</li>
																</ul>
															</div>
															<!--end col-md-8-->
															
														</div>
														<!--end row-->
													</div>
												</div>
											</div>
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