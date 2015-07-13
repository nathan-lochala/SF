<li>
    <a class="accordion-toggle {{ $menu_user or '' }}">
        <span class="glyphicons glyphicons-keys"></span>
        <span class="sidebar-title">Users </span>
        <span class="caret"></span>
    </a>
    <ul class="nav sub-nav">
        <li>
            <a href="{{ url('user/manage') }}">
                <span class="glyphicons glyphicons-unlock"></span>   Manage Users </a>
        </li>
    </ul>
</li>