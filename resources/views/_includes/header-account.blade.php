{{--START USER ACCOUNT
        REQUEST: USER PICTURE / USER ID / USER NAME
        --}}
<li class="dropdown">
    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="
@if(empty(Auth::user()->employee->Photo))
    {{ asset('assets/img/Unknown.png') }}
@else
                {{--data:image/png;base64,{!! base64_encode(Auth::user()->employee->Photo) !!}--}}
            @endif
                " alt="avatar" class="mw30 br64 mr15">
        {{--{{ Auth::user()->getFullName(2) }}--}}
        <span class="caret caret-tp hidden-xs"></span>
    </a>
    <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
        <li class="dropdown-header clearfix">
            <div class="pull-left ml10">
                <select id="user-status">
                    <optgroup label="Current Status:">
                        <option value="1-1">Away</option>
                        <option value="1-2">Offline</option>
                        <option value="1-3" selected="selected">Online</option>
                    </optgroup>
                </select>
            </div>

            <div class="pull-right mr10">
                <select id="user-role">


                    {{--START LOG IN AS--}}
                    <optgroup label="Logged in As:">
                        <option value="1-1">Client</option>
                        <option value="1-2">Editor</option>
                        <option value="1-3" selected="selected">Admin</option>
                    </optgroup>
                    {{--END LOG IN AS--}}


                </select>
            </div>

        </li>

        {{--START ACCOUNT MENU--}}

        <li class="list-group-item">
            <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-envelope"></span> Messages
                <span class="label label-warning">2</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-user"></span> Friends
                <span class="label label-warning">6</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> Account Settings </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-bell"></span> Activity  </a>
        </li>
        <li class="dropdown-footer">
            <a href="
            {{ url('auth/logout') }}
            " class="">
                <span class="fa fa-power-off pr5"></span> Logout </a>
        </li>
    </ul>
</li>
{{--END USER ACCOUNT--}}