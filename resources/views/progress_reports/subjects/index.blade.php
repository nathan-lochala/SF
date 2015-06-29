@extends('app')

@section('content')
    
    @include('_tiles.new-tiles')
        {{-- Add tiles with tiles.new.tile --}}
        @include('_tiles.new-tile',[
                'url' => 'progress_reports/change_school_year',
                'column_size' => 'col-md-3',
                'color' => 'system',
                'icon' => 'calendar',
                'title' => 'Change Year',
                'body' => 'View a different school year.'
        ])
    @include('_tiles.end-new-tiles')
    

    @include('_content.title',['heading' => 'Subjects For ' . $year . ' Progress Reports','body' => ''])

    @include('_forms.new-head',['color' => 'panel-info'])

    <!--NEW FORM-->
    {!! Form::open(['id' => 'admin-form','url' => 'progress_reports/' . $school_year_id . '/subjects']) !!}
    @include('_forms.new-body')
    <h2>Add a New Subject</h2>
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    @include('progress_reports/subjects.form');

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Add Subject','submit_name' => 'submit','submit_id' => 'submit'])

    {{-------------------------------------------------------------------------------------------------}}
    {{------------------------------------------TABLE--------------------------------------------------}}
    {{-------------------------------------------------------------------------------------------------}}

    @include('_panels.start')
    @include('_panels.new-panel',[
        'panel_id' => '1',
        'title' => $year . ' Subjects',
        'panel_class' => '',
        'panel_heading_class' => '',
        'panel_body_class' => '',
        'color' => '',
        'icon' => ''
        ])
    @include('_panels.new-row')
    @include('_panels.new-column',['column_size' => 'col-md-12'])

    @if($subjects->isEmpty())
        <em>Nothing to Display</em>
        @else
                <!-- TABLE OF OF ALL REGIONS AVAILABLE TO THE PROJECTS -->
    
        @include('_tables.new-table',['table_head' => ['Subject Name','Age Level']])
        @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->subject }}</td>
                <td>{{ $subject->age_level_id }}</td>
                <td style="width: 10%"><a href={{ url('progress_reports/' . $subject->id . '/outcomes/') }}>@include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'success',
                            'text' => 'Outcomes',
                            'icon' => 'fa fa-plus'
                        ])</a></td>
                <td style="width: 10%"><a href={{ url('progress_reports/' . $school_year_id . '/subjects/' . $subject->id . '/edit') }}>@include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'info',
                            'text' => 'Edit',
                            'icon' => 'fa fa-pencil'
                        ])</a></td>
                @if($subject->school_year_id > env('SCHOOL_YEAR_ID'))
                    <td style="width: 10%"><a href={{ url('progress_reports/' . $school_year_id . '/subjects/' . $subject->id . '/delete') }}>@include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'danger',
                            'text' => 'Delete',
                            'icon' => 'fa fa-trash'
                        ])</a></td>
                @endif
            </tr>
        @endforeach
    @endif

    @include('_tables.end-new-table')
    @include('_panels.end-new-column')
    @include('_panels.end-new-row')
    @include('_panels.end-new-panel')
    @include('_panels.end')

@stop

{{-------------------------------------------------------------------------------------------------}}
{{-------------------------------------------------------------------------------------------------}}
{{-------------------------------------------------------------------------------------------------}}

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $.validator.methods.smartCaptcha = function (value, element, param) {
                return value == param;
            };

            $("#admin-form").validate({

                /* validation states + elements
                 ------------------------------------------- */

                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",

                /* validation rules
                 ------------------------------------------ */

                rules: {
                    subject: {
                        required: true
                    }
                },

                /* @validation error messages
                 ---------------------------------------------- */

                messages: {
                    subject: {
                        required: 'A subject name is required!'
                    }
                },

                /* @validation highlighting + error placement
                 ---------------------------------------------------- */

                highlight: function (element, errorClass, validClass) {
                    $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                },
                errorPlacement: function (error, element) {
                    if (element.is(":radio") || element.is(":checkbox")) {
                        element.closest('.option-group').after(error);
                    } else {
                        error.insertAfter(element.parent());
                    }
                }

            });
        });

    </script>
@stop