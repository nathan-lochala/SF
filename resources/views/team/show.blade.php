@extends('app')
{{--
    |--------------------------------------------------------------------------
    | info = Light Blue
    | primary = Dark Blue
    | success = Green
    | warning = Orange
    | danger = Red
    | alert = Purple
    | system = Green/Blue
    | dark = Black
    |--------------------------------------------------------------------------
--}}

@section('content')

    @include('_content.title',['heading' => $team->name . '<small> Leader: ' . $team->teamLeader->getFullName(false,true) . '</small>','body' => $team->description])

    {{--
    panel.new

    panel.row
    panel.column
    panel.panel
    panel.panel


    |----------------------------------|
    |                                  |
    |----------------------------------|

    |----------------------------------|
    |                                  |
    |----------------------------------|


    panel.row
    panel.column
    panel.panel

    panel.column
    panel.panel

    |----------------||----------------|
    |                ||                |
    |----------------||----------------|

--}}

    @include('_panels.start')
    @include('_panels.new-row',['class' => ''])
    @include('_panels.new-column',['column_size' => 'col-md-12'])
    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:1---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '1',
       'title' => 'Team Details',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'info',
       'icon' => 'fa fa-heart-o'
       ])

    @include('team/partials.team-details')

    <br />
    <br />
    <a style="width: 25%; position: absolute; bottom: 10px; right: 10px" href="{{ url('team/' . $team->id . '/edit') }}">
        @include('_buttons.click-button',[
            'size' => 'xs',
            'color' => 'info',
            'text' => 'Edit Team',
            'icon' => 'fa fa-pencil'
        ])</a>

    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}

    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:2---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '2',
       'title' => 'Leader Details',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'info',
       'icon' => 'fa fa-user'
       ])

    @include('member/partials.member-details',['member' => $team->teamLeader])

    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}
    @include('_content.title',['heading' => 'Members','body' => 'Below are the current members of the ' . $team->name . '.'])

    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:3---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '3',
       'title' => 'Current Members',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'alert',
       'icon' => 'fa fa-users'
       ])

    @if($member_list->isEmpty())
        <em>This team currently has no members. {!! link_to('team/' . $team->id . '/add_members','Click here to add members.') !!}</em>
    @else
        <a style="width: 25%; float: right;" href="{{ url('team/' . $team->id . '/add_members') }}">
            @include('_buttons.click-button',[
                'size' => 'xs',
                'color' => 'alert',
                'text' => 'Add Members',
                'icon' => 'fa fa-plus'
            ])</a>
        <br />
        <br />

        <!-- TABLE OF MEMBERS -->
        @include('_tables.new-table',['id' => 'member_list', 'table_head' => ['ID','Name','Email','Mobile','']])
        @foreach($member_list as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{!! $member->getFullName(false,true) !!}</td>
                <td>{!! $member->email() !!}</td>
                <td>{{ $member->mobile }}</td>
                <td style="width: 20%"><a  href="{{ url('team/' . $team->id . '/remove_member/' . $member->id) }}">
                        @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'dark',
                            'text' => 'Remove From Team',
                            'icon' => 'fa fa-mail-forward'
                        ])
                    </a></td>
            </tr>
        @endforeach
        @include('_tables.end-new-table')
        @include('_tables.end-new-table')

    @endif


    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}

    @include('_content.title',['heading' => 'Interested Members','body' => 'These members have voiced interest in learning more about the ' . $team->name . '.'])

    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:4---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '4',
       'title' => 'Intersted Members',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'alert',
       'icon' => 'fa fa-thumbs-o-up'
       ])

    @if($interests_list->isEmpty())
        <em>No members have yet to express interest in this team.</em>
    @else
        <a style="width: 25%; float: right;" href="{{ url('team/' . $team->id . '/clear_interests') }}">
            @include('_buttons.click-button',[
                'size' => 'xs',
                'color' => 'danger',
                'text' => 'Clear List of Interested Members',
                'icon' => 'fa fa-rotate-left'
            ])</a>
        <br />
        <br />

        <!-- TABLE OF INTERESTED MEMBERS -->
        @include('_tables.new-table',['id' => 'member_list', 'table_head' => ['ID','Name','Email','Mobile','']])
        @foreach($interests_list as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{!! $member->getFullName(false,true) !!}</td>
                <td>{!! $member->email() !!}</td>
                <td>{{ $member->mobile }}</td>
                <td style="width: 20%"><a  href="{{ url('team/' . $team->id . '/add/' . $member->id) }}">
                        @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'alert',
                            'text' => 'Add Member to Team',
                            'icon' => 'fa fa-plus'
                        ])
                    </a></td>
            </tr>
        @endforeach
        @include('_tables.end-new-table')
        @include('_tables.end-new-table')
    @endif


    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}
    @include('_panels.end-new-column')
    @include('_panels.end-new-row')
    @include('_panels.end')





@stop

