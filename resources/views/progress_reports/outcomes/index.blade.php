@extends('app')

@section('content')

    @include('_content.title',['heading' => $subject->subject,'body' => $subject->age_level_id . 'YO Progress Report Outcomes'])

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
    <!--NEW FORM-->
    {!! Form::open(['id' => 'admin-form','url' => 'progress_reports/' . $subject->id . '/outcomes']) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    <!----------------------------------------------------------------------------->
    <!------------------------New outcome textarea field---------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('outcome','Outcome Details') !!}
    {!! Form::textarea('outcome', null, ['class' => 'gui-textarea','id' => 'outcome','placeholder' => 'Example: Catches a ball with their body.']) !!}
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!-----------------------New outcome_type select------------------------------------->
    @include(('_forms.new-section'))
    {!! Form::label('outcome_type','Outcome Type') !!}
    @include('_forms.new-label',['icon_placement' => '','class' => 'section'])
    @foreach($outcome_type_dropdown as $display => $item_array)
        <label for="{{ $item_array['value'] }}" class="option block mt15">
            {!! Form::radio('outcome_type',$item_array['value'],$item_array['checked'],['id' => $item_array['value']]) !!}
            <span class="radio"></span>{{ $display }}</label>
    @endforeach
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <div id="custom_area" style="display: none;">
        <!----------------------------------------------------------------------------->
        <!---------------------------New help text field----------------------------->
        @include('_forms.new-section')
        @include('_forms.new-label',['icon_placement' => ''])
        {!! Form::label('help','Help Text') !!}
        {!! Form::text('help',null,['class' => 'gui-input','id' => 'help','placeholder' => 'Example: Highlight or cicle which lines the student can cut.']) !!}
        @include('_forms.end-new-label')
        @include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
        <!----------------------------------------------------------------------------->

        <!----------------------------------------------------------------------------->
        <!------------------------New choice_list textarea field---------------------------->
        @include(('_forms.new-section'))
        @include('_forms.new-label',['icon_placement' => ''])
        {!! Form::label('choice_list','Selection List') !!}
        {!! Form::textarea('choice_list', null, ['class' => 'gui-textarea','id' => 'choice_list','placeholder' => 'Option 1, Option 2, Option 3']) !!}
        @include('_forms.input-footer',['title' => 'Note:','message' => 'Please use a comma (,) to seperate the different selection options.'])
        @include('_forms.end-new-label')
        @include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
        <!----------------------------------------------------------------------------->

    </div>


    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Add Outcome','submit_name' => 'submit','submit_id' => 'outcome_submit'])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    {{-------------------------------------------------------------------------------------------------}}
    {{------------------------------------------TABLE--------------------------------------------------}}
    {{-------------------------------------------------------------------------------------------------}}

    @include('_panels.start')
    @include('_panels.new-panel',[
        'panel_id' => '1',
        'title' => $subject->subject . ' - Outcomes',
        'panel_class' => '',
        'panel_heading_class' => '',
        'panel_body_class' => '',
        'color' => '',
        'icon' => ''
        ])
    @include('_panels.new-row')
    @include('_panels.new-column',['column_size' => 'col-md-12'])

    @if($outcomes->isEmpty())
        <em>Nothing to Display</em>
        @else
                <!-- TABLE OF OF ALL REGIONS AVAILABLE TO THE PROJECTS -->

        @include('_tables.new-table',['table_head' => ['Outcome Name']])
        @foreach($outcomes as $outcome)
            <tr>
                <td>{{ $outcome->outcome }}</td>
                <td style="width: 10%"><a
                            href={{ url('progress_reports/' . $subject->id . '/outcomes/' . $outcome->id . '/edit') }}>@include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'info',
                            'text' => 'Edit',
                            'icon' => 'fa fa-pencil'
                        ])</a></td>
                @if($subject->school_year_id > env('SCHOOL_YEAR_ID'))
                    <td style="width: 10%"><a
                                href={{ url('progress_reports/' . $subject->id . '/outcomes/' . $outcome->id . '/delete') }}>@include('_buttons.click-button',[
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

@section('js')
    <script type="text/javascript">
            jQuery(document).ready(function() {
                $.validator.methods.smartCaptcha = function(value, element, param) {
                    return value == param;
                };

                $('input[name="outcome_type"]').click(function(){
                    if(this.value != 6){
                        $('#custom_area').show();
                    }else{
                        $('#custom_area').hide();
                    }
                });

                $("#admin-form").validate({

                    /* validation states + elements
                     ------------------------------------------- */

                    errorClass: "state-error",
                    validClass: "state-success",
                    errorElement: "em",

                    /* validation rules
                     ------------------------------------------ */

                    rules: {
                        outcome: {
                            required: true
                        },
                        outcome_type: {
                            required: true
                        },
                        help: {
                            required: true
                        },
                        choice_list: {
                            required: true
                        }

                    },

                    /* @validation error messages
                     ---------------------------------------------- */

                    messages: {
                        outcome: {
                            required: 'This field is required'
                        },
                        outcome_type: {
                            required: 'This field is required'
                        },
                        help: {
                            required: 'This field is required'
                        },
                        choice_list: {
                            required: 'This field is required'
                        }
                    },

                    /* @validation highlighting + error placement
                     ---------------------------------------------------- */

                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                    },
                    errorPlacement: function(error, element) {
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