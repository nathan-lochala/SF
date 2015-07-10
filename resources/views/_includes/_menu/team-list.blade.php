<li>
    <a class="accordion-toggle {{ $menu_team or '' }}">
        <span class="fa fa-heart-o"></span>
        <span class="sidebar-title">Teams</span>
        <span class="caret"></span>
    </a>
    <ul class="nav sub-nav">
        <li>
            <a href="{{ url('team/create') }}">
                <span class="glyphicons glyphicons-edit"></span>   Manage Teams </a>
        </li>
        <li>
            <a href="{{ url('team') }}">
                <span class="fa fa-folder-open"></span>   View All Teams </a>
        </li>
    </ul>
</li>
