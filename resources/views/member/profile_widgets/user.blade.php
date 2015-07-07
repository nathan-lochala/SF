@include('_panels.new-panel',[
       'panel_id' => $id,
       'title' => 'User',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'alert',
       'icon' => 'fa fa-lock'
       ])

        <!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
@if($member->user)
    <h2>Reset User's Password</h2>

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-primary'])
            <!--NEW FORM-->
    {!! Form::open(['id' => 'admin-form','url' => 'user/' . $member->user->id . '/password_reset']) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    @include('user.password-reset-form')

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Reset Password','submit_name' => 'submit','submit_id' => 'add'])

@else
    @if(!$member->email)
        <h3>The member does not have an email setup. <a href="{{ url('member/' . $member->id . '/edit') }}">Click here to add one.</a> </h3>
        @else
                <!----------------------------------------------------------------------------->
        <!----------------------------------------------------------------------------->
        <h2>Create User From Member</h2>
        <h3>Note:</h3>
        <h5>The member's email address will be used as the username for the new user.</h5>
        <h5>The member only needs to be made a user if they are to log into the SIF Portal.</h5>
        <hr />
        <h3>Username: {{ $member->email }}</h3>
        @include('_forms.new-head',['color' => 'panel-warning'])
                <!--NEW FORM-->
        {!! Form::open(['id' => 'admin-form','url' => 'user/' . $member->id . '/create']) !!}
        @include('_forms.new-body')
        @include('_forms.new-row')
        @include('_forms.new-column',['column_size' => 'col-md-12'])

        @include('user.password-reset-form')

        @include('_forms.end-new-column')
        @include('_forms.end-new-row')
        @include('_forms.end-new-body')
        @include('_forms.end-new-head',['submit_title' => 'Add User','submit_name' => 'submit','submit_id' => 'add'])
    @endif
@endif

@include('_panels.end-new-panel')