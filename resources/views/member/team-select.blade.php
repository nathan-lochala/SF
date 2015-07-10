<!----------------------------------------------------------------------------->
<!-----------------------New team_id[] checkbox------------------------------------->
<?php
if(!isset($member)){
    $member = null;
}
$team_list = \App\Team\Team::teamsSelectArray($member)
?>

@include(('_forms.new-section'))
{!! Form::label('outcome_type','Would you like any information about the various SIF Teams?') !!}
@include('_forms.new-label',['icon_placement' => '','class' => 'section'])
@foreach($team_list as $key => $team_name)
    <label for="{{ $team_name['value'] }}" class="option block mt15">
        {!! Form::checkbox('team_id[]',$team_name['value'],$team_name['checked'],['id' => $team_name['value']]) !!}
        <span class="checkbox"></span>{{ $key }}</label>
    @endforeach
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
            <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->