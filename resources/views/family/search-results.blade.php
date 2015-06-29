@extends('app')

@section('content')

    @include('_content.title',['heading' => 'Search All Families','body' => 'You can search by Parent or Student names, mobile, or email.'])


    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
    <!--NEW FORM-->
    {!! Form::open(['id' => 'admin-form','url' => 'family/search_results']) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    <!----------------------------------------------------------------------------->
    <!---------------------------New search_term text field----------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('search_term','Search Families') !!}
    {!! Form::text('search_term',null,['class' => 'gui-input','id' => 'search_term','placeholder' => 'You can search by Parent or Student names, mobile, or email.']) !!}

    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->


    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Search','submit_name' => 'submit','submit_id' => 'search'])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    {{--
        panel.new

        panel.new.row
        panel.new.column
        panel.new.panel
        panel.new.panel


        |----------------------------------|
        |                                  |
        |----------------------------------|

        |----------------------------------|
        |                                  |
        |----------------------------------|


        panel.new.row
        panel.new.column
        panel.new.panel

        panel.new.column
        panel.new.panel

        |----------------||----------------|
        |                ||                |
        |----------------||----------------|

    --}}

    @include('_content.title',['heading' => 'Search Results','body' => ''])


    @include('_panels.start')
    @include('_panels.new-row',['class' => ''])
    @include('_panels.new-column',['column_size' => 'col-md-12'])
    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:1---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '1',
       'title' => 'Student Results',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => '',
       'icon' => 'fa fa-search'
       ])

    @if($student_list->isEmpty())

        <em>No Students Found</em>

        @else

                <!-- TABLE OF Students -->
        @include('_tables.new-table',['table_head' => ['ID','Name','Age Level','Status','']])
        @foreach( $student_list as $student)
            <tr>
                <td>{{ $student->StudentID }}</td>
                <td>{{ $student->full_name_lf or '' }}</td>
                <td>{{ $student->age->AgeGroup or '' }}</td>
                <td>{{ $student->status->Description or '' }}</td>
                <td style="width: 15%;"><a style="width: 15%;" href="{{ url('family/identification/' . $student->FamilyID) }}">
                @include('_buttons.click-button',[
                    'size' => 'xs',
                    'color' => 'system',
                    'text' => 'View Family',
                    'icon' => 'fa fa-group'
                ])</a></td>
            </tr>
        @endforeach
        @include('_tables.end-new-table')

    @endif

    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}

    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:2---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '2',
       'title' => 'Parent Results',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => '',
       'icon' => 'fa fa-search'
       ])
    @if(empty($parent_list))

        <em>No Parents Found</em>

        @else

                <!-- TABLE OF Students -->
        @include('_tables.new-table',['table_head' => ['ID','Name','']])
        @foreach( $parent_list as $parent)
            <tr>
                <td>{{ $parent->ParentID }}</td>
                <td>{{ $parent->LastName}}, {{ $parent->FirstName }}</td>
                <td style="width: 15%;"><a style="width: 15%;" href="{{ url('family/identification/' . $parent->FamilyID) }}">
                        @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'system',
                            'text' => 'View Family',
                            'icon' => 'fa fa-group'
                        ])</a></td>
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