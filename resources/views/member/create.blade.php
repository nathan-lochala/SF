@extends('app')

@section('content')


    @include('_content.title',['heading' => 'Add New Member','body' => 'Fill out the form below to add a new member to the SIF family.' ])

            <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
            <!--NEW FORM-->
    {!! Form::open(['id' => 'admin-form','url' => 'member/create']) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    @include('member.form')

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Add Member','submit_name' => 'submit','submit_id' => 'add'])
            <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->


    @include('_content.title',['heading' => 'Today\'s New Members!','body' => 'These are the members that have just joined today.'])


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
       'title' => 'Today',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'danger',
       'icon' => 'fa fa-group'
       ])

    @if($member_list->isEmpty())
        <em>Nothing to Display</em>
    @else
        <!-- TABLE OF Members -->
        @include('_tables.new-table',['id' => 'member_table', 'table_head' => ['ID','Family Name','Mobile','Email']])
            @foreach($member_list as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->last_name }}</td>
                    <td>{{ $member->mobile }}</td>
                    <td>{{ $member->email }}</td>
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
                        first_name: {
                            required: true
                        },
                        last_name: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        }

                    },

                    /* @validation error messages
                     ---------------------------------------------- */

                    messages: {
                        first_name: {
                            required: 'Your first name is required.'
                        },
                        last_name: {
                            required: 'Your family name is required.'
                        },
                        email: {
                            required: 'Your email is required.',
                            email: 'Please enter a valid email address.'
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
