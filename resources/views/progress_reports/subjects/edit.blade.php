@extends('app')

@section('content')

    @include('_forms.new-head',['color' => 'panel-info'])

    <!--NEW FORM-->
    {!! Form::model($subject,['id' => 'admin-form', 'method' => 'PUT' ,'url' => 'progress_reports/' . $school_year_id . '/subjects/' . $subject->id]) !!}
    @include('_forms.new-body')
    <h2>Update Subject</h2>
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    @include('progress_reports/subjects.form');

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.new-body')
    @include('_forms.end-new-head',['submit_title' => 'Update Subject','submit_name' => 'submit','submit_id' => 'submit'])
@stop