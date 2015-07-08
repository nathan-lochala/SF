@extends('app')

@section('content')
        
        @include('_tiles.new-tiles')
            {{-- Add tiles with tiles.new.tile --}}
            @include('_tiles.new-tile',[
                    'url' => 'team/create',
                    'column_size' => 'col-md-4',
                    'color' => 'system',
                    'icon' => 'fa fa-users',
                    'title' => 'Back',
                    'body' => 'to the team list'
            ])
        @include('_tiles.end-new-tiles')

<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
@include('_forms.new-head',['color' => 'panel-system'])
        <!--UPDATE FORM-->
{!! Form::model($team,['method' => 'PATCH','id' => 'admin-form','url' => 'team/' . $team->id]) !!}
@include('_forms.new-body')
@include('_forms.new-row')
@include('_forms.new-column',['column_size' => 'col-md-12'])

            @include('team.form')
            
@include('_forms.end-new-column')
@include('_forms.end-new-row')
@include('_forms.end-new-body')
@include('_forms.end-new-head',['submit_title' => 'Update','submit_name' => 'submit','submit_id' => 'update'])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->


@stop

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function() {

            // Init Select2 - Basic Single
            $("#leader_member_id").select2({
                placeholder: "",
            });

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
                    name: {
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
                        required: 'The Team Name is a required field.'
                    },
                    description: {
                        required: 'The Team Description is a required field.'
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
