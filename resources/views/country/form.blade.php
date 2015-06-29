<!----------------------------------------------------------------------------->
<!---------------------------New Country text field----------------------------->
@include('_forms.new-section')
@include('_forms.new-label',['icon_placement' => ''])
{!! Form::label('Country','Country Name') !!}
{!! Form::text('Country',null,['class' => 'gui-input','id' => 'country_name','placeholder' => 'Example: United States of America']) !!}
@include('_forms.end-new-label')
@include('_forms.end-new-section')
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->

<!----------------------------------------------------------------------------->
<!---------------------------New Code text field----------------------------->
@include('_forms.new-section')
@include('_forms.new-label',['icon_placement' => ''])
{!! Form::label('Code','Country Code') !!}
{!! Form::text('Code',null,['class' => 'gui-input','id' => 'country_code','placeholder' => 'Example: US']) !!}
@include('_forms.end-new-label')
@include('_forms.end-new-section')
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->

<!----------------------------------------------------------------------------->
<!---------------------------New chinese text field----------------------------->
@include('_forms.new-section')
@include('_forms.new-label',['icon_placement' => ''])
{!! Form::label('chinese','Chinese Name - 国家的名字') !!}
{!! Form::text('chinese',null,['class' => 'gui-input','id' => 'country_chinese','placeholder' => 'Example: 美国']) !!}
@include('_forms.end-new-label')
@include('_forms.end-new-section')
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->