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

    @include('_content.title',['heading' => 'Edit Group','body' => 'Use the form below to edit the ' . $group->name . ' group.'])

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
            <!--UPDATE FORM-->
    {!! Form::model($group,['method' => 'PATCH','id' => 'admin-form','url' => 'study_group/' . $group->id]) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    @include('study_group.form')

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Update Study Group','submit_name' => 'submit','submit_id' => 'update'])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->


@stop

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function () {

            // Init Select2 - Basic Single
            $("#district_id").select2({
                width: '100%'
            });

            // Init Select2 - Basic Single
            $("#leader_member_id").select2({
                width: '100%'
            });

            // Init DateTimepicker - fields + Date disabled (only time picker)
            $('#meeting_time').datetimepicker({
                defaultDate: "9/25/2014",
                pickDate: false
            });
        });
    </script>
@stop

