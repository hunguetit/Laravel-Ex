<div class="page-header navbar navbar-fixed-top ">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<ul class="nav navbar-nav">
					<li><a href="{{asset('home')}}" style="font-size: 20px;color: rgb(214, 70, 53);">Home</a></li>
			</ul>
			
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">

				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="{{ asset(Auth::user()->avatar) }}"/>{{ Auth::user()->name }}
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
						<a href="{{asset('admin/users_list/'.Auth::user()->id.'/profile')}}">
							<i class="icon-user"></i> My Profile </a>
						</li>

						<li>
						<a href="{{asset('auth/logout')}}">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
						<!-- END USER LOGIN DROPDOWN -->
						<!-- BEGIN QUICK SIDEBAR TOGGLER -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-quick-sidebar-toggler">
							<a href="{{asset('/')}}" class="dropdown-toggle">
								<i class="icon-logout"></i>
							</a>
						</li>
							<!-- END QUICK SIDEBAR TOGGLER -->
						</ul>
							</div>
							<!-- END TOP NAVIGATION MENU -->
						</div>
						<!-- END HEADER INNER -->
					</div>
