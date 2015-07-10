<li>
    <a class="accordion-toggle {{ $menu_study_groups or '' }}">
        <span class="glyphicons glyphicons-home"></span>
        <span class="sidebar-title">Study Groups</span>
        <span class="caret"></span>
    </a>
    <ul class="nav sub-nav">
        <li>
            <a href="{{ url('study_group/create') }}">
                <span class="glyphicons glyphicons-edit"></span>   Manage Groups </a>
        </li>
        <li>
            <a href="{{ url('study_group') }}">
                <span class="fa fa-folder-open"></span>   View All Groups </a>
        </li>
    </ul>
</li>
