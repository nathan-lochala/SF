@include('_panels.new-panel',[
       'panel_id' => $id,
       'title' => 'Member Details',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'primary',
       'icon' => 'fa fa-user'
       ])

<a style="width: 25%; position: absolute; bottom: 10px; right: 10px"
   href="{{ url('member/' . $member->id . '/edit') }}">
    @include('_buttons.click-button',[
        'size' => 'xs',
        'color' => 'primary',
        'text' => 'Edit Details',
        'icon' => 'fa fa-pencil'
    ])</a>

<h2>{{$member->getFullName()}}</h2>
<h5>Email: {!! $member->email() !!}</h5>
<h5>Mobile: {{$member->mobile or 'N/A'}}</h5>
<h5>District: {{$member->district->name or 'N/A'}} {{ $member->district->chinese or '' }}</h5>

@include('_panels.end-new-panel')