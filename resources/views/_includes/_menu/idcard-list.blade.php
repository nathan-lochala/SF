<li>
    <a class="accordion-toggle {{ $menu_idcards or '' }}">
        <span class="glyphicons glyphicons-tags"></span>
        <span class="sidebar-title">ID Cards </span>
        <span class="caret"></span>
    </a>
    <ul class="nav sub-nav">
        <li>
            <a href="{{ url('idcard') }}">
                <span class="glyphicons glyphicons-edit"></span>   Manage ID Cards </a>
        </li>
        <li>
            <a href="{{ url('idcard/export') }}">
                <span class="glyphicons glyphicons-print"></span>   Export List </a>
        </li>
    </ul>
</li>
