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

    @include('_tiles.new-tiles')
    {{-- Add tiles with tiles.tile --}}
    @include('_tiles.new-tile',[
        'url' => 'member/' . $member->id,
        'column_size' => 'col-md-12',
        'color' => 'info',
        'icon' => 'ICON',
        'title' => 'Back',
        'body' => 'Return to member dashboard.'
    ])
    @include('_tiles.end-new-tiles')

    @include('_content.title',['heading' => $member->last_name . ' Family','body' => 'Add members to ' . $member->getFullName(FALSE) . '\'s family.'])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
            <!--NEW FORM-->
    {!! Form::open(['id' => 'admin-form','url' => 'family/create']) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    <!----------------------------------------------------------------------------->
    <!-----------------------New family_members_id[] select------------------------------------->
    @include(('_forms.new-section'))
    {!! Form::label('family_members_id[]','Select Members') !!}
    {!! Form::select('family_members_id[]', $member_list, null, ['class' => 'select2-multiple form-control', 'multiple' => 'multiple' ,'id' => 'member_list','placeholder' => '']) !!}
    <i class="arrow"></i>
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    {{-- HIDDEN INPUT NAME=member_id VALUE=$member->id ID=member_id  --}}
    {!! Form::hidden('member_id', $member->id,['id' => 'member_id']) !!}

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Add Members','submit_name' => 'submit','submit_id' => 'add'])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
@stop

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            // Init Select2 - Basic Multiple
            $("#member_list").select2({
                placeholder: "No Members Selected",
                allowClear: true
            });
        });

    </script>
@stop