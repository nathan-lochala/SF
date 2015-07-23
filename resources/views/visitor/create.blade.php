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

    @include('_content.title',['heading' => 'Welcome New Visitors!','body' => 'We want to welcome you to SIF! Please fill out the form below so we have a record of your visit.'])

        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
@include('_forms.new-head',['color' => 'panel-primary'])
        <!--NEW FORM-->
{!! Form::open(['id' => 'admin-form','url' => 'visitor/create']) !!}
@include('_forms.new-body')
@include('_forms.new-row')
@include('_forms.new-column',['column_size' => 'col-md-12'])

        <!----------------------------------------------------------------------------->
<!---------------------------New first_name text field----------------------------->
@include('_forms.new-section')
@include('_forms.new-label',['icon_placement' => ''])
{!! Form::label('first_name','名 - First Name (Given Name)') !!}
{!! Form::text('first_name',null,['class' => 'gui-input','id' => 'first_name','placeholder' => 'First Name']) !!}
@include('_forms.end-new-label')
@include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->

<!----------------------------------------------------------------------------->
<!---------------------------New last_name text field----------------------------->
@include('_forms.new-section')
@include('_forms.new-label',['icon_placement' => ''])
{!! Form::label('last_name','贵姓 - Last Name (Family Name or Surname)') !!}
{!! Form::text('last_name',null,['class' => 'gui-input','id' => 'last_name','placeholder' => 'Last Name']) !!}
@include('_forms.end-new-label')
@include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->

        <!----------------------------------------------------------------------------->
<!---------------------------New email text field----------------------------->
@include('_forms.new-section')
@include('_forms.new-label',['icon_placement' => ''])
{!! Form::label('email','邮件地址 - Email Address') !!}
{!! Form::text('email',null,['class' => 'gui-input','id' => 'email','placeholder' => 'Email Address ']) !!}
@include('_forms.end-new-label')
@include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->

@include('_forms.end-new-column')
@include('_forms.end-new-row')
@include('_forms.end-new-body')
@include('_forms.end-new-head',['submit_title' => 'Add Visitor','submit_name' => 'submit','submit_id' => 'add', 'extra_buttons' =>
    // If you would like to add additional buttons, uncomment the arrays below.
            [
    //        ['color' => '','title' => '','name' => '', 'will_submit' => '']
    //        ['color' => '','title' => '','name' => '', 'will_submit' => '']
            ]
    ])
        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->






@stop

