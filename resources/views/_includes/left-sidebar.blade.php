<!-- Start: Sidebar Left -->
<aside id="sidebar_left" class="nano nano-primary affix">

    <!-- Start: Sidebar Left Content -->
    <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Header -->
        @include('_includes.left-sidebar-header')

        {{--@include('_includes.left-sidebar-author')--}}


        <!-- Start: Sidebar Left Menu -->
        <ul class="nav sidebar-menu">

            @include('_includes.left-sidebar-menu')

            {{--@include('_includes.left-sidebar-bullets')--}}

            {{--@include('_includes.left-sidebar-progress-bars')--}}

        </ul>
        <!-- End: Sidebar Menu -->

        <!-- Start: Sidebar Collapse Button -->
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>
        <!-- End: Sidebar Collapse Button -->

    </div>
    <!-- End: Sidebar Left Content -->

</aside>
<!-- End: Sidebar Left -->