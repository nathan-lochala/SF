    <!----------------------------------------------------------------------------->
    <!---------------------------New name text field----------------------------->
    @include('_forms.new-section')
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('name','Name of Study Group') !!}
    {!! Form::text('name',null,['class' => 'gui-input','id' => 'name','placeholder' => 'Enter the name of the group. Example: Old Testiment']) !!}
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!------------------------New description textarea field---------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('description','Describe the Group') !!}
    {!! Form::textarea('description', null, ['class' => 'gui-textarea','id' => 'description','placeholder' => 'Example: This group examines the Old Testament and how we, as Christians, can learn to live with complete reliance on God to be our front and rear guard.']) !!}
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!------------------------New address textarea field---------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('address','Group Meeting Location') !!}
    {!! Form::textarea('address', null, ['class' => 'gui-textarea','id' => 'address','placeholder' => 'Please put the full address of where the group meets.']) !!}
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!-----------------------New district_id select------------------------------------->
    @include(('_forms.new-section'))
    {!! Form::label('district_id','District') !!}
    <br />
    {{-- select('name','select_array','default value','other')  class = select2-single or select2-multiple --}}
    {!! Form::select('district_id', $district_list, null, ['class' => 'select2-single' ,'id' => 'district_id','placeholder' => '']) !!}
    <i class="arrow"></i>
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!---------------------------New meeting_time time field----------------------------->
    @include('_forms.new-section')
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('meeting_time','Group Meeting Time') !!}
    {!! Form::text('meeting_time',null,['class' => 'gui-input form-control','id' => 'meeting_time','placeholder' => '']) !!}
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!---------------------------New frequency text field----------------------------->
    @include('_forms.new-section')
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('frequency','How often does the group meet?') !!}
    {!! Form::text('frequency',null,['class' => 'gui-input','id' => 'frequency','placeholder' => 'Example: The first Sunday of the month.']) !!}
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!-----------------------New leader_member_id select------------------------------------->
    @include(('_forms.new-section'))
    {!! Form::label('leader_member_id','Group Leader') !!}
    {{-- select('name','select_array','default value','other')  class = select2-single or select2-multiple --}}
    <br />
    {!! Form::select('leader_member_id', $member_list, null, ['class' => 'select2-single' ,'id' => 'leader_member_id','placeholder' => '']) !!}
    <i class="arrow"></i>
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->