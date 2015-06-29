@extends('app')

@section('content')

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
    {!! Form::model($type,['method' => 'PATCH','id' => 'admin-form','url' => 'identification/idcard_type/' . $type->id]) !!}
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
    @include('_forms.end-new-head',['submit_title' => 'Update Type','submit_name' => 'submit','submit_id' => ''])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->




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
                        required: 'Please give a ID Card Type.'
                    },
                    chinese: {
                        required: 'Please add a Chinese Translation of the ID Card Type.'
                    },
                    description: {
                        required: 'Please give a ID Card Description'
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