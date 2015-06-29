@extends('app')

@section('content')

    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel-----------------------------------------}}


    @include('_panels.start')
    @include('_panels.new-panel',[
        'panel_id' => '1',
        'title' => 'Flagged Student Identification',
        'panel_class' => '',
        'panel_heading_class' => '',
        'panel_body_class' => '',
        'color' => '',
        'icon' => ''
        ])

    @include('_panels.new-row')
    @include('_panels.new-column',['column_size' => 'col-md-12'])

    @include('_panels.end-new-column')
    @include('_panels.end-new-row')
    @if(empty($student_list))
        <em>Nothing to Display</em>

        @else
                <!-- TABLE OF FLAGGED STUDENTS -->
        @include('_tables.new-table',['table_head' => ['Name','Age Level','']])
        @foreach($student_list as $student)
            <tr>
                <td>{{ $student->LastName }}, {{ $student->FirstName }}</td>
                <td>{{ $student->AgeGroup}}</td>
                <td style="width: 20%"><a href={{ url('family/identification/' . $student->FamilyID) }}>@include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'info',
                            'text' => 'Process Identification',
                            'icon' => 'fa fa-pencil'
                        ])</a></td>
            </tr>
        @endforeach
        @include('_tables.end-new-table')

    @endif


    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}

    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel-----------------------------------------}}


    @include('_panels.new-panel',[
        'panel_id' => '2',
        'title' => 'Flagged Parent Identification',
        'panel_class' => '',
        'panel_heading_class' => '',
        'panel_body_class' => '',
        'color' => '',
        'icon' => ''
        ])

    @include('_panels.new-row')
    @include('_panels.new-column',['column_size' => 'col-md-12'])

    @include('_panels.end-new-column')
    @include('_panels.end-new-row')
    @if(empty($parent_list))
        <em>Nothing to Display</em>
        @else
                <!-- TABLE OF FLAGGED STUDENTS -->
        @include('_tables.new-table',['table_head' => ['Name','Relationship','']])
        @foreach($parent_list as $parent)
            <tr>
                <td>{{ $parent->LastName}}, {{ $parent->FirstName }}</td>
                <td>@if($parent->Relation == 'M')
                        Mother
                    @else
                        Father
                    @endif
                </td>
                <td style="width: 20%"><a href={{ url('family/identification/' . $parent->FamilyID) }}>@include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'info',
                            'text' => 'Process Identification',
                            'icon' => 'fa fa-pencil'
                        ])</a></td>
            </tr>
        @endforeach
        @include('_tables.end-new-table')

    @endif


    @include('_panels.end-new-panel')
    @include('_panels.end')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}


@stop