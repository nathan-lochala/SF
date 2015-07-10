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

@include('_content.title',['heading' => 'Add Members <small>' . $team->name . '</small>','body' => 'Add one or more members to the ' . $team->name . '.'])

        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
@include('_forms.new-head',['color' => 'panel-info'])
        <!--NEW FORM-->
{!! Form::open(['id' => 'admin-form','url' => 'team/' . $team->id . '/add_members']) !!}
@include('_forms.new-body')
@include('_forms.new-row')
@include('_forms.new-column',['column_size' => 'col-md-12'])

        <!----------------------------------------------------------------------------->
<!-----------------------New member_id[] select------------------------------------->
@include(('_forms.new-section'))
{!! Form::label('member_id[]','Members') !!}
{{-- select('name','select_array','default value','other')  class = select2-single or select2-multiple --}}
<br />
{!! Form::select('member_id[]', $member_list, null, ['class' => 'select2-multiple', 'multiple' => 'multiple','id' => 'member_id','placeholder' => '']) !!}
<i class="arrow"></i>
@include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->

@include('_forms.end-new-column')
@include('_forms.end-new-row')
@include('_forms.end-new-body')
@include('_forms.end-new-head',['submit_title' => 'Add Members','submit_name' => 'submit','submit_id' => 'add', 'extra_buttons' =>
    // If you would like to add additional buttons, uncomment the arrays below.
            [
    //        ['color' => '','title' => '','name' => '', 'will_submit' => '']
    //        ['color' => '','title' => '','name' => '', 'will_submit' => '']
            ]
    ])
        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->


@stop

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function () {

            // Init Select2 - Basic Multiple
            $("#member_id").select2({
                placeholder: "Select One or More Members",
                allowClear: true,
                width: '100%'
            });

        });
    </script>
@stop

