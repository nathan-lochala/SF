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

@include('_content.title',['heading' => 'Updating User <small>' . $user->email . '</small>','body' => 'Use the form below to modify this user\'s login details.' ])

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
            <!--UPDATE FORM-->
    {!! Form::model($user,['method' => 'PATCH','id' => 'admin-form','url' => 'user/' . $user->id]) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    <h3>Associated With Member: {!! $user->member->getFullName(false,true) !!}</h3>
    <br />

    <!----------------------------------------------------------------------------->
    <!---------------------------New email text field----------------------------->
    @include('_forms.new-section')
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('email','Username') !!}
    {!! Form::text('email',null,['class' => 'gui-input','id' => 'email','placeholder' => 'Must be an email address.']) !!}
            <!---- ADD INPUT FOOTER form.inputfooter---->
    @include('_forms.input-footer',['title' => 'Note:','message' => 'The username MUST be a unique email address.'])
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
<br />
@include('_forms.section-divider',['title' => 'Reset User\'s Password (Optional)','id' => ''])

    <!----------------------------------------------------------------------------->
    <!---------------------------New new_password text field----------------------------->
    @include('_forms.new-section')
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('new_password','New Password') !!}
    {!! Form::input('password','new_password',null,['class' => 'gui-input','id' => 'new_password','placeholder' => '**************']) !!}
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!---------------------------New new_password_confirm text field----------------------------->
    @include('_forms.new-section')
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('new_password_confirm','Confirm New Password') !!}
    {!! Form::input('password','new_password_confirm',null,['class' => 'gui-input','id' => 'new_password_confirm','placeholder' => '**************']) !!}
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Update User','submit_name' => 'submit','submit_id' => 'update'])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->





@stop


@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function () {

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
                    email: {
                        required: true,
                        email: true
                    },
                    new_password: {
                        minlength: 6
                    },
                    new_password_confirm: {
                        equalTo: "#new_password"
                    }

                },

                /* @validation error messages
                 ---------------------------------------------- */

                messages: {
                    email: {
                        email: 'A valid email is required.',
                        required: 'An email is required.'
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
