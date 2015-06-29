@extends('app')

@section('content')

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

    @include('_panels.start')
    @include('_panels.new-row',['class' => ''])
    @include('_panels.new-column',['column_size' => 'col-md-12'])
    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:1---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '1',
       'title' => 'Parents',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'primary',
       'icon' => 'fa fa-user'
       ])

    @if($parent_list->isEmpty())
        <em>No Parents or Guardians Listed</em>
        @else
                <!-- TABLE OF PARENTS -->
        @include('_tables.new-table',['table_head' => ['ID','Name','Relation','Mobile','Email','']])
        @foreach($parent_list as $parent)
            <tr>
                <td>{{ $parent->ParentID }}</td>
                <td>{{ $parent->full_name_fl }}</td>
                <td>{{ $parent->relationship() }}</td>
                <td>{{ $parent->Mobile }}</td>
                <td><a href={{ url('mailto:' . $parent->Email) }}>{{ $parent->Email }}</a></td>
                <td><a style="" href="{{ url('identification/new?table_type=Parents&id=' . $parent->ParentID) }}">
                        @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'info',
                            'text' => 'Add ID',
                            'icon' => 'fa fa-plus'
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

    @include('_panels.new-row',['class' => ''])
    @include('_panels.new-column',['column_size' => 'col-md-12'])

    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:3---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '3',
       'title' => 'Students',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'system',
       'icon' => 'fa fa-group'
       ])

    <!-- TABLE OF STUDENTS -->
    @include('_tables.new-table',['table_head' => ['ID','Name','Date of Birth','Campus','Age Level','Status','']])
    @foreach($student_list as $student)
        <tr>
            <td>{{ $student->StudentID }}</td>
            <td>{{ $student->full_name_fl }}</td>
            <td>{{ display_date($student->Birthdate) }}</td>
            <td>{{ $student->campus->campus_name }}</td>
            <td>{{ $student->age->AgeGroup }}</td>
            <td>{{ $student->status->Description }}</td>
            <td><a style="" href="{{ url('identification/new?table_type=Student&id=' . $student->StudentID) }}">
                    @include('_buttons.click-button',[
                        'size' => 'xs',
                        'color' => 'info',
                        'text' => 'Add ID',
                        'icon' => 'fa fa-plus'
                    ])</a></td>

        </tr>

    @endforeach
    @include('_tables.end-new-table')



    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}


    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:4---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '4',
       'title' => 'Government Identification',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => '',
       'icon' => ''
       ])
    @if(count($identification_list) == 0)
        <em>Nothing to Display</em>
        @else
                <!-- TABLE OF FLAGGED STUDENTS -->
        @include('_tables.new-table',['table_head' => ['Name','Document Type','Expiration Date','']])
        @foreach($identification_list as $collection)
            @if(!$collection->isEmpty())
                @foreach($collection as $id)
                    <tr>
                        <td>{{ $id->id_last_name or '- - - - - - - - - -'}} {{ $id->id_first_name}}</td>
                        <td>{{ $id->type->identification_type }}</td>
                        @if(!is_null($id->id_expiration_date))
                            <td>{{ display_date($id->id_expiration_date) }}</td>
                        @else
                            <td>- - - - - - - - - -</td>
                        @endif
                        @if($id->flag_for_update == 1)
                            <td style="width: 20%"><a
                                        href={{ url('identification/' . $id->getTableType() . '/' . $id->id . '/edit') }}>@include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'warning',
                            'text' => 'Process Identification',
                            'icon' => 'fa fa-pencil'
                        ])</a></td>
                    </tr>
                    @else
                        <td style="width: 20%"><a
                                    href={{ url('identification/' . $id->getTableType() . '/' . $id->id . '/edit') }}>@include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'info',
                            'text' => 'Edit Identification',
                            'icon' => 'fa fa-pencil'
                        ])</a></td>
                        </tr>
                    @endif
                @endforeach
            @endif
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