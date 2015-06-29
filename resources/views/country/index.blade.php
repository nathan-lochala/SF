@extends('app')

@section('content')

    @include('_content.title',['heading' => 'Add New Country','body' => 'These countries are used throughout SRS and requires a Chinese translation.'])

    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('_forms.new-head',['color' => 'panel-info'])
    <!--NEW FORM-->
    {!! Form::open(['id' => 'admin-form','url' => 'country']) !!}
    @include('_forms.new-body')
    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])

    @include('country.form')

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Add Country','submit_name' => 'submit','submit_id' => 'add'])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    {{--
        panel.new
        
        panel.new.row
        panel.new.column
        panel.new.panel
        panel.new.panel
        
        
        |----------------------------------|
        |                                  |
        |----------------------------------|
        
        |----------------------------------|
        |                                  |
        |----------------------------------|
        
        
        panel.new.row
        panel.new.column
        panel.new.panel
        
        panel.new.column
        panel.new.panel
        
        |----------------||----------------|
        |                ||                |
        |----------------||----------------|
    
    --}}

    @include('_panels.start')
    @include('_panels.new-row',['class' => ''])
    @include('_panels.new-column',['column_size' => 'col-md-12'])
    {{--------------------------------------------------------------------------------}}
    {{------------------------------New Panel ID:1---------------------------------}}
    @include('_panels.new-panel',[
       'panel_id' => '1',
       'title' => 'Countries',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'info',
       'icon' => 'globe'
       ])

    @if(!$countries->isEmpty())
        <!-- TABLE OF Countries -->
        @include('_tables.new-table',['table_head' => ['ID','Name','Code','Chinese Translation','']])
            @foreach($countries as $country)
                <tr>
                    <td>{{ $country->CountryID }}</td>
                    <td>{{ $country->Country }}</td>
                    <td>{{ $country->Code }}</td>
                    <td>{{ $country->chinese }}</td>
                    <td><a style="width: 15%;" href="{{ url('country/' . $country->CountryID . '/edit') }}">
                    @include('_buttons.click-button',[
                        'size' => 'xs',
                        'color' => 'info',
                        'text' => 'Edit',
                        'icon' => 'fa fa-pencil'
                    ])</a></td>
                </tr>
            @endforeach
        @include('_tables.end-new-table')
    @else
        <em>Nothing to Display</em>
    @endif

    @foreach($countries as $country)

    @endforeach

    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}
    @include('_panels.end-new-column')
    @include('_panels.end-new-row')
    @include('_panels.end')



@stop