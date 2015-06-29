@extends('app')

@section('content')

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
    <!--UPDATE FORM-->
    {!! Form::model($outcome,['method' => 'PATCH','id' => 'admin-form','url' => 'progress_reports/'. $subject->id . '/outcomes/' . $outcome->id]) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    <!----------------------------------------------------------------------------->
    <!------------------------New outcome textarea field---------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('outcome','Outcome Details') !!}
    {!! Form::textarea('outcome', null, ['class' => 'gui-textarea','id' => 'outcome','placeholder' => 'Example: Catches a ball with their body.']) !!}
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!---------------------------New help text field----------------------------->
    @include('_forms.new-section')
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('help','Help Text') !!}
    {!! Form::text('help',null,['class' => 'gui-input','id' => 'help','placeholder' => 'Example: Highlight or cicle which lines the student can cut.']) !!}
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!------------------------New choice_list textarea field---------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('choice_list','Selection List - Disabled - If you would like to edit this list, please tell IT.') !!}
    {!! Form::textarea('choice_list', $outcome->displaySelection(), ['class' => 'gui-textarea','id' => 'choice_list','placeholder' => 'Option 1, Option 2, Option 3', 'disabled' => 'disabled' ]) !!}
    @include('_forms.input-footer',['title' => 'Note:','message' => 'Please use a comma (,) to seperate the different selection options.'])
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Update Outcome','submit_name' => 'submit','submit_id' => 'update'])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->




@stop