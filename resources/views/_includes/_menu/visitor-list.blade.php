<li>
    <a class="accordion-toggle {{ $menu_visitor or '' }}">
        <span class="glyphicons glyphicons-parents"></span>
        <span class="sidebar-title">Visitors </span>
        <span class="caret"></span>
    </a>
    <ul class="nav sub-nav">
        <li>
            <a href="{{ url('visitor/statistics') }}">
                <span class="glyphicons glyphicons-charts"></span>   Visitor Statistics </a>
        </li>

        <li>
            <a href="{{ url('visitor/create') }}">
                <span class="glyphicons glyphicons-parents"></span>   New Visitor </a>
        </li>
    </ul>
</li>