@extends('app')

@section('content')

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
    <!--NEW FORM-->
    {!! Form::open(['id' => 'admin-form','url' => 'identification/idcard_type']) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    <!----------------------------------------------------------------------------->
    <!---------------------------New type text field----------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('type','ID Card Type') !!}
    {!! Form::text('type',null,['class' => 'gui-input','id' => 'type','placeholder' => 'Example: Hong Kong ID Card']) !!}
    @include('_forms.input-footer',['title' => 'Note:','message' => 'Please use ENGLISH.'])
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!---------------------------New description text field----------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('description','Description') !!}
    {!! Form::text('description',null,['class' => 'gui-input','id' => 'description','placeholder' => 'Example: This is the ID Card given to all Hong Kong residence.']) !!}
    @include('_forms.input-footer',['title' => 'Note:','message' => 'Please use ENGLISH.'])
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!---------------------------New chinese text field----------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('chinese','ID Card Type in Chinese') !!}
    {!! Form::text('chinese',null,['class' => 'gui-input','id' => 'chinese','placeholder' => 'Example: 香港身份证']) !!}

    @include('_forms.input-footer',['title' => 'Note:','message' => 'Please 用中文写。'])
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->



    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Add Type','submit_name' => 'submit','submit_id' => ''])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
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

    @include('_panels.start')
    @include('_panels.new-row',['class' => ''])
    @include('_panels.new-column',['column_size' => 'col-md-12'])
    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:1---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '1',
       'title' => 'ID Card Type',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => '',
       'icon' => ''
       ])

    @if($idcard_list->isEmpty())
        <em>Nothing to Display</em>
        @else
                <!-- TABLE OF Visa Types -->
            @include('_tables.new-table',['table_head' => ['Type','Description','中文','','']])
            @foreach($idcard_list as $type)
                <tr>
                    <td>{{ $type->type }}</td>
                    <td style="width: 50%">{{ $type->description }}</td>
                    <td style="width: 15%">{{ $type->chinese }}</td>
                    <td style="width: 10%"><a href="{{ url('identification/idcard_type/' . $type->id . '/edit') }}">
                    @include('_buttons.click-button',[
                        'size' => 'xs',
                        'color' => 'info',
                        'text' => 'Edit',
                        'icon' => 'fa fa-pencil'
                    ])</a></td>
                    <td style="width: 10%"><a href="{{ url('identification/idcard_type/' . $type->id . '/delete') }}">
                    @include('_buttons.click-button',[
                        'size' => 'xs',
                        'color' => 'danger',
                        'text' => 'Delete',
                        'icon' => 'fa fa-trash'
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

@section('js')
    <script type="text/javascript">
            jQuery(document).ready(function() {
                $.validator.methods.smartCaptcha = function(value, element, param) {
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
                        type: {
                            required: true
                        },
                        chinese: {
                            required: true
                        },
                        description: {
                            required: true
                        }

                    },

                    /* @validation error messages
                     ---------------------------------------------- */

                    messages: {
                        name: {
                            required: 'Please give a Visa Type.'
                        },
                        chinese: {
                            required: 'Please add a Chinese Translation of the Visa Type.'
                        },
                        description: {
                            required: 'Please give a Visa Description'
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