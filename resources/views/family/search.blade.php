@extends('app')

@section('content')
    
    @include('_content.title',['heading' => 'Search All Families','body' => 'You can search by Parent or Student names, mobile, or email.'])



<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
@include('_forms.new-head',['color' => 'panel-info'])
        <!--NEW FORM-->
{!! Form::open(['id' => 'admin-form','url' => 'family/search_results']) !!}
@include('_forms.new-body')
@include('_forms.new-row')
@include('_forms.new-column',['column_size' => 'col-md-12'])

<!----------------------------------------------------------------------------->
<!---------------------------New search_term text field----------------------------->
@include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('search_term','Search Families') !!}
    {!! Form::text('search_term',null,['class' => 'gui-input','id' => 'search_term','placeholder' => '']) !!}

    @include('_forms.end-new-label')
@include('_forms.end-new-section')
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->


@include('_forms.end-new-column')
@include('_forms.end-new-row')
@include('_forms.end-new-body')
@include('_forms.end-new-head',['submit_title' => 'Search','submit_name' => 'submit','submit_id' => 'search'])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->


@stop
