<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        @include('users.includes.head')
        @yield('style')
        @yield('script')
    </head>
    <body class="page-header-fixed page-quick-sidebar-over-content">
            @yield('script')
            @include('users.includes.script')
        <!-- BEGIN HEADER -->
            @include('users.includes.header_index')
        <!-- END HEADER -->

        <div class="clearfix">
        </div>

        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
                @yield('content')
            <!-- END CONTENT -->
            
            <!-- BEGIN FOOTER -->
                
            <!-- END FOOTER -->
        </div>
        @include('users.includes.contact')

        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
            @include('users.includes.footer')
        <!-- END JAVASCRIPTS -->
    </body>
</html>