<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        @include('admin.includes.head')
        @include('admin.includes.script')
        @yield('style')
    </head>
    <body class="page-header-fixed page-quick-sidebar-over-content">
        <!-- BEGIN HEADER -->
            @include('admin.includes.header')
        <!-- END HEADER -->

        <div class="clearfix">
        </div>

        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
                @include('admin.includes.sidebar')
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
                @yield('content')
            <!-- END CONTENT -->

            <!-- BEGIN FOOTER -->
                @include('admin.includes.footer')
            <!-- END FOOTER -->
        </div>

        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        
            
            
        <!-- END JAVASCRIPTS -->
    </body>
</html>