<!---- New subject text field ---->
@include(('_forms.new-section'))
@include('_forms.new-label',['icon_placement' => ''])
{!! Form::label('subject','Subject Name') !!}
{!! Form::text('subject',null,['class' => 'gui-input','id' => 'subject','placeholder' => '']) !!}
<!---- ADD INPUT FOOTER form.inputfooter---->
@include('_forms.input-footer',['title' => 'Note:','message' => 'This is what shows up as headings on the progress reports.'])
@include('_forms.end-new-label')
@include('_forms.end-new-section')
<!---- END subject text field ---->

<!---- New age_level_id select ---->
@include(('_forms.new-section'))
{!! Form::label('age_level_id','Age Level') !!}
@include('_forms.new-label',['icon_placement' => '','class' => 'select'])
{{-- select('name','select_array','default value','other') --}}
{!! Form::select('age_level_id', $age_levels, null, ['id' => 'age_level','placeholder' => '']) !!}
<i class="arrow"></i>
@include('_forms.end-new-label')
@include('_forms.end-new-section')
<!---- END age_level_id select field ---->

<!---- New school_year_id select ---->
@include(('_forms.new-section'))
{!! Form::label('school_year_id','Active for which school year?') !!}
@include('_forms.new-label',['icon_placement' => '','class' => 'select'])
{{-- select('name','select_array','default value','other') --}}

{!! Form::select('school_year_id', $school_year, $school_year_id, ['id' => 'school_year','placeholder' => '']) !!}
<i class="arrow"></i>
<!---- ADD INPUT FOOTER form.inputfooter---->
@include('_forms.input-footer',['title' => 'Note','message' => 'This dropdown defaults to the current school year'])
@include('_forms.end-new-label')
@include('_forms.end-new-section')
<!---- END school_year_id select field ---->