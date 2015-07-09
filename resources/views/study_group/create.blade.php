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

@include('_content.title',['heading' => 'Create New Study Group','body' => 'Use the form below to create a new study group that members can sign-up for.'])

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
            <!--NEW FORM-->
    {!! Form::open(['id' => 'admin-form','url' => 'study_group/create']) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    @include('study_group.form')

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Add Study Group','submit_name' => 'submit','submit_id' => 'add', 'extra_buttons' =>
        // If you would like to add additional buttons, uncomment the arrays below.
                [
        //        ['color' => '','title' => '','name' => '', 'will_submit' => '']
        //        ['color' => '','title' => '','name' => '', 'will_submit' => '']
                ]
        ])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->


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
       'title' => 'Study Groups',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'info',
       'icon' => 'glyphicons glyphicons-home'
       ])

    @if($group_list->isEmpty())
        <em>There no study groups to display.</em>
    @else
            <!-- TABLE OF Study Groups -->
        @include('_tables.new-table',['id' => 'study_group_table', 'table_head' => ['Group Name','Description','Meeting Time','','']])
            @foreach($group_list as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td width="50%">{{ $group->description }}</td>
                    <td>{{ $group->meeting_time }}</td>
                    <td width="15%"><a href="{{ url('study_group/' . $group->id . '/edit') }}">
                            @include('_buttons.click-button',[
                                'size' => 'xs',
                                'color' => 'info',
                                'text' => 'Edit',
                                'icon' => 'fa fa-pencil'
                            ])
                        </a></td>
                    <td width="15%"><a href="{{ url('study_group/' . $group->id . '/delete') }}">
                            @include('_buttons.click-button',[
                                'size' => 'xs',
                                'color' => 'danger',
                                'text' => 'Delete',
                                'icon' => 'fa fa-trash'
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

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function () {

            // Init Select2 - Basic Single
            $("#district_id").select2({
                width: '100%'
            });

            // Init Select2 - Basic Single
            $("#leader_member_id").select2({
                width: '100%'
            });

            // Init DateTimepicker - fields + Date disabled (only time picker)
            $('#meeting_time').datetimepicker({
                defaultDate: "9/25/2014",
                pickDate: false
            });
        });
    </script>
@stop
