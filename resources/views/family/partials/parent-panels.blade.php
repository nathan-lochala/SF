{{--
REQUIRES
$mother = \App\Family\Parents
$father = \App\Family\Parents





--}}

{{--------------------------------------------------------------------------------}}
{{------------------------------New Panel ID:1---------------------------------}}
@include('_panels.new-panel',[
   'panel_id' => '1',
   'title' => 'Father',
   'panel_class' => '',
   'panel_heading_class' => '',
   'panel_body_class' => '',
   'color' => 'info',
   'icon' => 'user'
   ])
@if(!empty($father))
    @include('_content.photo_blob',[
    'width' => '100',
    'photo_blob' => $father->Photo,
    'border' => '1',
    'style' => 'float: left; margin-right: 10px'
    ])
    <div>
        <h2>{{ $father->FirstName }} {{ $father->LastName }}</h2>
        {{ $father->Mobile }} | <a href="mailto:{{ $father->Email }}">{{ $father->Email }}</a>
        <br/>
        <strong>{{ $father->Position }}</strong>
        <br/>
        {{ $father->Employer }}


    </div>
    <a style="width: 25%; position: absolute; bottom: 10px; right: 10px"
       href="{{ url('identification/new?table_type=Parents&id=' . $father->ParentID) }}">
        @include('_buttons.click-button',[
        'size' => 'xs',
        'color' => 'info',
        'text' => 'Add ID',
        'icon' => 'fa fa-plus'
        ])</a>
@else
    <em>Student does not have a father listed.</em>
@endif

@include('_panels.end-new-panel')
@include('_panels.end-new-column')

{{--------------------------------------------------------------------------------}}
{{--------------------------------------------------------------------------------}}

@include('_panels.new-column',['column_size' => 'col-md-6'])

{{--------------------------------------------------------------------------------}}
{{------------------------------New Panel ID:2---------------------------------}}
@include('_panels.new-panel',[
   'panel_id' => '2',
   'title' => 'Mother',
   'panel_class' => '',
   'panel_heading_class' => '',
   'panel_body_class' => '',
   'color' => 'alert',
   'icon' => 'user'
   ])
@if(!empty($mother))
    @include('_content.photo_blob',[
'width' => '100',
'photo_blob' => $mother->Photo,
'border' => '1',
'style' => 'float: left; margin-right: 10px'
])
    <div>
        <h2>{{ $mother->FirstName }} {{ $mother->LastName }}</h2>
        {{ $mother->Mobile }} | <a href="mailto:{{ $mother->Email }}">{{ $mother->Email }}</a>
        <br/>
        <strong>{{ $mother->Position }}</strong>
        <br/>
        {{ $mother->Employer }}


    </div>
    <a style="width: 25%; position: absolute; bottom: 10px; right: 10px"
       href="{{ url('identification/new?table_type=Parents&id=' . $mother->ParentID) }}">
        @include('_buttons.click-button',[
        'size' => 'xs',
        'color' => 'info',
        'text' => 'Add ID',
        'icon' => 'fa fa-plus'
        ])</a>
@else
    <em>Student does not have a mother listed.</em>
@endif



@include('_panels.end-new-panel')