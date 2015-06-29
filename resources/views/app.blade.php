<!DOCTYPE html>
<html>

@include('_includes.head')
<!-------------------------------------------------------------+
      ".navbar" Helper Classes:
    ---------------------------------------------------------------+
     * Positioning Classes:
      '.navbar-static-top' - Static top positioned navbar
      '.navbar-static-top' - Fixed top positioned navbar

     * Available Skin Classes:
       .bg-light     .bg-dark    .bg-primary
       .bg-success   .bg-info    .bg-warning
       .bg-danger    .bg-alert   .bg-system
    ---------------------------------------------------------------+
     Example: <header class="navbar navbar-fixed-top bg-primary">
     Results: Fixed top navbar with blue background
    --------------------------------------------------------------->
<body class="dashboard-page sb-l-o sb-r-c">





{{--@include('_includes.demo-settings-pane')--}}

<!-- Start: Main -->
<div id="main">

    @include('_includes.header')


    <!-------------------------------------------------------------+
          "#sidebar_left" Helper Classes:
        ---------------------------------------------------------------+
         * Positioning Classes:
          '.affix' - Sets Sidebar Left to the fixed position

         * Available Skin Classes:
           .sidebar-dark (default no class needed)
           .sidebar-light
           .sidebar-light.light
        ---------------------------------------------------------------+
         Example: <aside id="sidebar_left" class="affix sidebar-light">
         Results: Fixed Left Sidebar with light/white background
        --------------------------------------------------------------->
    @include('_includes.left-sidebar')

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">
        @include('_includes.topbar-dropdown')
        {{--@include('_includes.topbar-content')--}}


    <!-- Begin: Content -->
        <section id="content" class="animated fadeIn">
            {{--FLASH MESSAGE--}}
            @include('flash::message')

        @yield('content')

        </section>
        <!-- End: Content -->

        {{--@include('_includes.content-footer')--}}

    </section>
    <!-- End: Content-Wrapper -->

    @include('_includes.right-sidebar')

</div>
<!-- End: Main -->

@include('_includes.js')
@yield('js')

@include('_includes.foot')