<li>
    <a class="accordion-toggle {{ $menu_member or '' }}">
        <span class="glyphicons glyphicons-group"></span>
        <span class="sidebar-title">Members</span>
        <span class="caret"></span>
    </a>
    <ul class="nav sub-nav">
        <li>
            <a href="{{ url('member/search') }}">
                <span class="fa fa-search"></span>   Search Members </a>
        </li>
        <li>
            <a href="{{ url('member/view_all') }}">
                <span class="glyphicons glyphicons-notes_2"></span>   View All Members </a>
        </li>
        <li>
            <a href="{{ url('member/create') }}">
                <span class="glyphicons glyphicons-user_add"></span>   Add New Members </a>
        </li>
    </ul>
</li>