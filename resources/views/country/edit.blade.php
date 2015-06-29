@extends('app')

@section('content')

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
            <!--UPDATE FORM-->
    {!! Form::model($country,['method' => 'PATCH','id' => 'admin-form','url' => 'country/' . $country->CountryID]) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])
    
                @include('country.form')
                
    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Update Country','submit_name' => 'submit','submit_id' => 'update'])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->




@stop