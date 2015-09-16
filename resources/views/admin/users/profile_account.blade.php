@extends('admin.layouts.default')

@section('title','User Profile')

@section('content')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">

			<!-- BEGIN PAGE HEADER-->			
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Profile</a>
					</li>
				</ul>

			</div>
			<!-- END PAGE HEADER-->
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
												<a href="#tab_1_1" data-toggle="tab">Personal Info</a>
											</li>
										</ul>
									</div>
											<div class="tab-pane active" id="tab_1_1">
												<div class="row">
													<div class="col-md-3">
														<ul class="list-unstyled profile-nav">
															<li>
																<img src="{{asset($user->avatar)}}" class="img-responsive" alt=""/>
															</li>
														</ul>
													</div>
													<div class="col-md-9">
														<div class="row">
															<div class="col-md-8 profile-info">
																<h1>{{$user->name}}</h1>
																<ul class="list-inline">
																	<li>
																		<i class="fa fa-user"></i> {{$user->username}}
																	</li>
																	<li>
																		<i class="fa fa-envelope"></i> {{$user->email}}
																	</li>
																	<li>
																		<i class="fa fa-bolt"></i> {{$user->role}}
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

@stop


@stop