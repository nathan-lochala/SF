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

    @include('_content.title',['heading' => $group->name . '  <small>Lead by: ' . $group->leader->getFullName(false,true) . '</small>','body' => $group->description])

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
       'title' => 'Study Group Details',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'info',
       'icon' => 'fa fa-home'
       ])

    @include('study_group/partials.group-details')

    <br />
    <br />
    <a style="width: 25%; position: absolute; bottom: 10px; right: 10px" href="{{ url('study_group/' . $group->id . '/edit') }}">
        @include('_buttons.click-button',[
            'size' => 'xs',
            'color' => 'info',
            'text' => 'Edit Study Group',
            'icon' => 'fa fa-pencil'
        ])</a>

    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}

    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:2---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '2',
       'title' => 'Group Leader Details',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'info',
       'icon' => 'fa fa-user'
       ])

    @include('member/partials.member-details',['member' => $group->leader])

    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}

    @include('_content.title',['heading' => 'Members','body' => 'This table lists all the members of the study group.'])


    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:3---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '3',
       'title' => 'Study Group Members',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'alert',
       'icon' => 'fa fa-group'
       ])

    @if($group->members->isEmpty())
        <em>This group has no members. {!! link_to('study_group/' . $group->id . '/add_members','Click here at add members') !!}</em>
    @else
        <a style="width: 25%; float: right;" href="{{ url('study_group/' . $group->id . '/add_members') }}">
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
                <td style="width: 20%"><a  href="{{ url('study_group/' . $group->id . '/remove_member/' . $member->id) }}">
                        @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'dark',
                            'text' => 'Remove From Group',
                            'icon' => 'fa fa-mail-forward'
                        ])
                    </a></td>
            </tr>
        @endforeach
        @include('_tables.end-new-table')
    @endif

    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}
    @include('_panels.end-new-column')
    @include('_panels.end-new-row')
    @include('_panels.end')






@stop

