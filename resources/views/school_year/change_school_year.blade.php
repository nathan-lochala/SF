@extends('app')

@section('content')

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
    <!--NEW FORM-->
    {!! Form::open(['id' => 'admin-form','url' => $post_url]) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    <!----------------------------------------------------------------------------->
    <!-----------------------New school_year_id select------------------------------------->
    @include(('_forms.new-section'))
    {!! Form::label('school_year_id','Select the desired School Year.') !!}
    @include('_forms.new-label',['icon_placement' => '','class' => 'select'])
    {!! Form::select('school_year_id', $year_dropdown, null, ['id' => 'school_year_id','placeholder' => '']) !!}
    <i class="arrow"></i>
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Change School Year','submit_name' => 'submit','submit_id' => 'year'])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

@stop