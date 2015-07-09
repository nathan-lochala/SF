<!-- Start: Header -->
<header class="navbar navbar-fixed-top">
    <div class="navbar-branding">
        <a class="navbar-brand" href="
        {{ url('/') }}
        ">
            {!! env('ORG_NAME') !!}
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
    </div>

    @include('_includes.header-leftside-icons')

    {{--@include('_includes.header-search')--}}


{{--START RIGHT-SIDE TOP BAR SECTION--}}
    <ul class="nav navbar-nav navbar-right">

        {{--@include('_includes.header-notification')--}}

        {{--@include('_includes.header-language')--}}

        {{--@include('_includes.header-divider')--}}

        @include('_includes.header-account')

{{--END RIGHT-SIDE TOP BAR SECTION--}}
    </ul>

</header>
<!-- End: Header -->