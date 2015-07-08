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
    @if(isset($_GET['family_id']))
    {{-- HIDDEN INPUT NAME=family_id VALUE=$_GET['family_id'] ID=family_id  --}}
    {!! Form::hidden('family_id', $_GET['family_id'],['id' => 'family_id']) !!}
    @endif

    <!----------------------------------------------------------------------------->
    <!---------------------------New email text field----------------------------->
    @include('_forms.new-section')
        @include('_forms.new-label',['icon_placement' => ''])
        {!! Form::label('email','邮件地址 - Email Address') !!}
        {!! Form::text('email',$email,['class' => 'gui-input','id' => 'email','placeholder' => 'Email Address ']) !!}
        @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!---------------------------New mobile text field----------------------------->
    @include('_forms.new-section')
        @include('_forms.new-label',['icon_placement' => ''])
        {!! Form::label('mobile','电话号码 - Mobile Number') !!}
        {!! Form::text('mobile',$mobile,['class' => 'gui-input','id' => '','placeholder' => 'Mobile Number']) !!}
        @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!-----------------------New district_id select------------------------------------->
    @include(('_forms.new-section'))
        {!! Form::label('district_id','你住在哪个区? - Which district do you live in?') !!}
        @include('_forms.new-label',['icon_placement' => '','class' => 'select'])
        {{-- select('name','select_array','default value','other') --}}
        {!! Form::select('district_id', $district_list, $district_id, ['id' => 'district_id','placeholder' => '']) !!}
        <i class="arrow"></i>
        @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

