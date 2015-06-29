        <!----------------------------------------------------------------------------->
<!---------------------------New name text field----------------------------->
@include('_forms.new-section')
@include('_forms.new-label',['icon_placement' => ''])
{!! Form::label('name','Team Name') !!}
{!! Form::text('name',null,['class' => 'gui-input','id' => 'name','placeholder' => 'Example: Worship Team']) !!}
@include('_forms.end-new-label')
@include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->

<!----------------------------------------------------------------------------->
<!------------------------New description textarea field---------------------------->
@include(('_forms.new-section'))
@include('_forms.new-label',['icon_placement' => ''])
{!! Form::label('description','Team Description') !!}
{!! Form::textarea('description', null, ['class' => 'gui-textarea','id' => 'description','placeholder' => 'Example: This team is in charge of organizing and leading worship during church services.']) !!}
@include('_forms.end-new-label')
@include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->

<!----------------------------------------------------------------------------->
<!-----------------------New leader_member_id select------------------------------------->
@include(('_forms.new-section'))
{!! Form::label('leader_member_id','Team Leader') !!}
@include('_forms.new-label',['icon_placement' => '','class' => 'select'])
{{-- select('name','select_array','default value','other') --}}
{!! Form::select('leader_member_id', $member_list, null, ['id' => 'leader_member_id','placeholder' => '']) !!}
<i class="arrow"></i>
@include('_forms.end-new-label')
@include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->