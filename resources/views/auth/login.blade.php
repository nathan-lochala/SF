<!DOCTYPE html>
<html>

@include('_includes.head')

<body class="external-page external-alt sb-l-c sb-r-c">

<!-- Start: Main -->
<div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

        <!-- Begin: Content -->
        <section id="content">

            <div class="admin-form theme-info mw500" id="login">

                <!-- Login Logo -->
                <div class="row table-layout">
                        <img src="{{ asset('assets/img/logos/login_logo.png') }}" title="{{ env('HEAD_TITLE') }} Logo" class="center-block img-responsive" style="max-width: 275px;">
                </div>
                <!-- Login Panel/Form -->
                <div class="panel mt30 mb25">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel-body bg-light p25 pb15">

                            {{--<!-- Social Login Buttons -->--}}
                            {{--<div class="section row">--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<a href="#" class="button btn-social facebook span-left btn-block">--}}
                      {{--<span>--}}
                        {{--<i class="fa fa-facebook"></i>--}}
                      {{--</span>Facebook</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<a href="#" class="button btn-social googleplus span-left btn-block">--}}
                      {{--<span>--}}
                        {{--<i class="fa fa-google-plus"></i>--}}
                      {{--</span>Google+</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6 hidden">--}}
                                    {{--<a href="#" class="button btn-social twitter span-left btn-block">--}}
                      {{--<span>--}}
                        {{--<i class="fa fa-twitter"></i>--}}
                      {{--</span>Twitter</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <!-- Divider -->
                            <div class="section-divider mv30">
                                <span>{{ env('HEAD_TITLE') }}</span>
                            </div>
                {{--ERROR REPORTING--}}
                            @if (count($errors) > 0)

                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                            <!-- Username Input -->
                            <div class="section">
                                <label for="email" class="field-label text-muted fs18 mb10">Email</label>
                                <label for="email" class="field prepend-icon">
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="gui-input" placeholder="Enter email">
                                    <label for="email" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </label>
                            </div>

                            <!-- Password Input -->
                            <div class="section">
                                <label for="password" class="field-label text-muted fs18 mb10">Password</label>
                                <label for="password" class="field prepend-icon">
                                    <input type="password" name="password" id="password" class="gui-input" placeholder="Enter password">
                                    <label for="password" class="field-icon">
                                        <i class="fa fa-lock"></i>
                                    </label>
                                </label>
                            </div>

                        </div>

                        <div class="panel-footer clearfix">
                            <button type="submit" class="button btn-primary mr10 pull-right">Login</button>
                            <label class="switch block switch-primary pull-left input-align mt10">
                                <input type="checkbox" name="remember" id="remember" checked>
                                <label for="remember" data-on="YES" data-off="NO"></label>
                                <span>Remember me</span>
                            </label>
                        </div>

                    </form>
                </div>

                <!-- Registration Links -->
                <div class="login-links">
                    {{--<p>--}}
                        {{--<a href="{{ url('/password/email') }}" class="active" title="Sign In">Forgot Password?</a>--}}
                    {{--</p>--}}
                    {{--<p>Haven't yet Registered?--}}
                        {{--<a href="pages_login-alt.html" title="Sign In">Sign up here</a>--}}
                    {{--</p>--}}
                </div>

                <!-- Registration Links(alt) -->
                <div class="login-links hidden">
                    <a href="pages_login-alt.html" class="active" title="Sign In">Sign In</a> |
                    <a href="pages_register-alt.html" class="" title="Register">Register</a>
                </div>

            </div>

        </section>
        <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
<script src={{ asset('vendor/jquery/jquery-1.11.1.min.js') }}></script>
<script src={{ asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}></script>


<!-- Theme Javascript -->
<script src={{ asset('assets/js/utility/utility.js') }}></script>
<script src={{ asset('assets/js/demo/demo.js') }}></script>
<script src={{ asset('assets/js/main.js') }}></script>

<!-- Page Javascript -->
<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        Demo.init();


    });
</script>

<!-- END: PAGE SCRIPTS -->





@include('_includes.foot')