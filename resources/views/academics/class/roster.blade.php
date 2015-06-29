@extends('app')

@section('content')

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
    <?php $x = 1 ?>
    @if(!$homeroom_list->isEmpty())
        @include('_content.title',['heading' => 'Homeroom','body' => ''])
        @foreach($homeroom_list as $homeroom)
            {{--------------------------------------------------------------------------------}}
            {{------------------------------New Panel ID:$x---------------------------------}}
            @include('_panels.new-panel',[
               'panel_id' => '1',
               'title' => 'Homeroom Roster - ' . $homeroom->Name,
               'panel_class' => '',
               'panel_heading_class' => '',
               'panel_body_class' => '',
               'color' => 'alert',
               'icon' => 'home'
               ])

            @foreach($homeroom->roster as $student)
                {{ $student->studentRecord->full_name_lf }} <br />

            @endforeach

            @include('_panels.end-new-panel')

            {{--------------------------------------------------------------------------------}}
            {{--------------------------------------------------------------------------------}}
            <?php $x++ ?>
        @endforeach
    @endif
    @if(!empty($class_roster))
        @include('_content.title',['heading' => 'Class List','body' => ''])
        @foreach($class_roster as $name => $class)
            @if($name != 'Lunch - Lunch')
                {{--------------------------------------------------------------------------------}}
                {{------------------------------New Panel ID: $x ---------------------------------}}
                @include('_panels.new-panel',[
                   'panel_id' => $x,
                   'title' => $name,
                   'panel_class' => '',
                   'panel_heading_class' => '',
                   'panel_body_class' => '',
                   'color' => 'info',
                   'icon' => 'group'
                   ])
                @foreach($class as $student)
                    {{ $student }} <br />

                @endforeach
                @include('_panels.end-new-panel')
                <?php $x++ ?>
                {{--------------------------------------------------------------------------------}}
                {{--------------------------------------------------------------------------------}}
            @endif
        @endforeach
    @endif

    @include('_panels.end-new-column')
    @include('_panels.end-new-row')
    @include('_panels.end')





@stop