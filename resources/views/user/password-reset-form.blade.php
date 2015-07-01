                <!-- password Form Input -->
        @include('_forms.new-section')
        @include('_forms.new-label',['icon_placement' => ''])
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
        @include('_forms.end-new-label')
        @include('_forms.end-new-section')

                <!-- password_confirm Form Input -->

        @include('_forms.new-section')
        @include('_forms.new-label',['icon_placement' => ''])
        {!! Form::label('password_confirm', 'Confirm Password:') !!}
        {!! Form::password('password_confirm', ['class' => 'form-control']) !!}
        @include('_forms.end-new-label')
        @include('_forms.end-new-section')

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
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirm: {
                        equalTo: "#password"
                    }

                },

                /* @validation error messages
                 ---------------------------------------------- */



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
