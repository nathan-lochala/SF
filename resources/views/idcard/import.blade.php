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

    @include('_content.title',['heading' => 'Import Existing ID Cards','body' => 'This form is to help batch import any existing ID Cards that may not be in the system.'])

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
            <!--NEW FORM-->
    {!! Form::open(['id' => 'admin-form','url' => 'idcard/import']) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])


        <!----------------------------------------------------------------------------->
        <!-----------------------New member_id[] select------------------------------------->
        @include(('_forms.new-section'))
        {!! Form::label('member_id[]','Add up to 10 members at a time with ID Cards that need to be picked up.') !!}
        {{-- select('name','select_array','default value','other')  class = select2-single or select2-multiple --}}
        <br />
        {!! Form::select('member_id[]', $member_list, null, ['class' => 'select2-multiple', 'multiple' => 'multiple','id' => 'member_list','placeholder' => '']) !!}
        <i class="arrow"></i>
        @include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
        <!----------------------------------------------------------------------------->

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Import Cards','submit_name' => 'submit','submit_id' => 'add', 'extra_buttons' =>
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
            $("#member_list").select2({
                placeholder: "Select Members",
                allowClear: true,
                width: '100%'
            });

        });
    </script>
@stop
