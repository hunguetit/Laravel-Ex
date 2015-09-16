<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="#" method="POST">
						<a href="#" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="#" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				
				<li class="">
					<a href="#">
					<i class="icon-users"></i>
					<span class="title">Users Managed</span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/users_list') }}">
							<i class="icon-list"></i>
							Users List</a>
						</li>
						<li>
							<a href="{{ url('admin/insert') }}">
							<i class="fa fa-plus"></i>
                            Insert</a>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="#">
					<i class="fa fa-list-alt"></i>
					<span class="title">Category</span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/categories') }}">
							<i class="fa fa-tree"></i>
                            List Caregories</a>
						</li>
						<li>
							<a href="{{ url('admin/categories_add') }}">
							<i class="fa fa-plus"></i>
                            Add Caregories</a>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="{{ url('admin/product') }}">
					<i class="icon-handbag"></i>
					<span class="title">Product</span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/product_list') }}">
							<i class="fa fa-list"></i>
							Product List</a>
						</li>
						<li>
							<a href="{{ url('admin/product_add') }}">
							<i class="fa fa-plus"></i>
                            Add Product</a>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="#">
					<i class="fa fa-shopping-cart"></i>
					<span class="title">Order</span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/orders_list') }}">
							<i class="fa fa-th-list"></i>
                            List Order</a>
						</li>
						<li>
							<a href="{{ url('admin/orders_print') }}">
							<i class="fa fa-print"></i>
                            Print Bill Order</a>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="#">
					<i class="fa fa-phone"></i>
					<span class="title">Support Customers</span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/chat') }}">
							<i class="fa fa-weixin"></i>
                            Chat Online</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>