@extends('app')

@section('content')

@include('_content.title',['heading' => 'Create a New Team','body' => 'Use this form to create a new team that members can then be added to.'])

        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
@include('_forms.new-head',['color' => 'panel-info'])
        <!--NEW FORM-->
{!! Form::open(['id' => 'admin-form','url' => 'team/create']) !!}
@include('_forms.new-body')
@include('_forms.new-row')
@include('_forms.new-column',['column_size' => 'col-md-12'])

@include('team.form')

@include('_forms.end-new-column')
@include('_forms.end-new-row')
@include('_forms.end-new-body')
@include('_forms.end-new-head',['submit_title' => 'Add Team','submit_name' => 'submit','submit_id' => 'add'])
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
                'title' => 'Team List',
                'panel_class' => '',
                'panel_heading_class' => '',
                'panel_body_class' => '',
                'color' => 'info',
                'icon' => 'fa fa-group'
                ])

            @if($team_list->isEmpty())
                <em>Nothing to display...</em>
            @else
                <!-- TABLE OF TEAMS -->
                @include('_tables.new-table',['id' => 'team_table', 'table_head' => ['Name','Team Leader','','']])
                    @foreach($team_list as $team)
                        <tr>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->teamLeader->getFullName() }}</td>
                            <td width="15%"><a style="width: 25%;" href="{{ url('team/' . $team->id . '/edit') }}">
                            @include('_buttons.click-button',[
                                'size' => 'xs',
                                'color' => 'info',
                                'text' => 'Edit',
                                'icon' => 'fa fa-pencil'
                            ])</a></td>
                            <td width="15%"><a href="{{ url('team/' . $team->id . '/delete') }}">
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

