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
            {{-- Add tiles with tiles.new.tile --}}
            @include('_tiles.new-tile',[
                    'url' => 'member/' . $member->id,
                    'column_size' => 'col-md-4',
                    'color' => 'system',
                    'icon' => 'fa fa-user',
                    'title' => 'Back',
                    'body' => 'Back to Member Page'
            ])
        @include('_tiles.end-new-tiles')


@include('_content.title',['heading' => $member->getFullName(),'body' => 'Edit Details'])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
            <!--UPDATE FORM-->
    {!! Form::model($member,['method' => 'PATCH','id' => 'admin-form','url' => 'member/' . $member->id]) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])
    
    @include('member.form')
                
    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Update Member','submit_name' => 'submit','submit_id' => 'update'])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->




@stop

