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

    @include('_content.title',['heading' => 'Print Pending','body' => 'This table contains all the ID Cards that have not been printed yet.'])

    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:1---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '1',
       'title' => 'Print Pending',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'system',
       'icon' => 'glyphicons glyphicons-print'
       ])

    @if($print_list->isEmpty())
        <em>There are no ID Cards that have yet to be printed.</em>
    @else
            <!-- TABLE OF Print Pending -->
        @include('_tables.new-table',['id' => 'print_pending', 'table_head' => ['ID','Name','Added to List','']])
        @foreach($print_list as $print)
            <tr>
                <td>{{ $print->member->id }}</td>
                <td>{!! $print->member->getFullName(true,true) !!}</td>
                <td>{{ Carbon\Carbon::parse($print->created_at)->format('M d, Y') }}</td>
                <td>
                    <a href="{{ url('idcard/' . $print->id . '/printed') }}">
                        @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'system',
                            'text' => 'Mark as Printed',
                            'icon' => 'fa fa-check'
                        ])</a>
                </td>
            </tr>
        @endforeach
        @include('_tables.end-new-table')

    @endif


    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}

    <hr />

    @include('_content.title',['heading' => 'Delivery Pending','body' => 'This table contains all the ID Cards that have not been delivered to members yet.'])

    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:2---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '2',
       'title' => 'Delivery Pending',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'warning',
       'icon' => 'glyphicons glyphicons-share'
       ])

    @if($receive_list->isEmpty())
        <em>There are no ID Cards that have yet to be printed.</em>
        @else
                <!-- TABLE OF Print Pending -->
        @include('_tables.new-table',['id' => 'print_pending', 'table_head' => ['ID','Name','Printed On','']])
        @foreach($receive_list as $receive)
            <tr>
                <td>{{ $receive->member->id }}</td>
                <td>{!! $receive->member->getFullName(true,true) !!}</td>
                <td>{{ Carbon\Carbon::parse($receive->printed_at)->format('M d, Y') }}</td>
                <td>
                    <a href="{{ url('idcard/' . $receive->id . '/received') }}">
                        @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'warning',
                            'text' => 'Mark as Delivered',
                            'icon' => 'fa fa-check'
                        ])</a>
                </td>
                <td style="width: 25%;">
                    <a href="{{ url('idcard/' . $receive->id . '/reprint') }}">
                        @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'primary',
                            'text' => 'Re-print ID Card',
                            'icon' => 'fa fa-print'
                        ])</a>
                </td>
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

