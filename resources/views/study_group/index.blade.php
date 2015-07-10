@extends('app')
{{--
    |--------------------------------------------------------------------------
    | info = Light Blue
    | primary = Dark Blue
    | success = Green
    | warning = Orange
    | danger = Red
    | alert = Purple
    | system = Green/Blue
    | dark = Black
    |--------------------------------------------------------------------------
--}}

@section('content')

    @include('_tiles.new-tiles')
    {{-- Add tiles with tiles.tile --}}
    @include('_tiles.new-tile',[
        'url' => '#',
        'column_size' => 'col-md-6',
        'color' => 'info',
        'icon' => 'home',
        'title' => $group_list->count(),
        'body' => 'Total Study Groups'
])

    @include('_tiles.new-tile',[
        'url' => '#',
        'column_size' => 'col-md-6',
        'color' => 'system',
        'icon' => 'group',
        'title' => \App\StudyGroup\StudyGroup::allMembersCount(),
        'body' => 'Members in Study Groups'
])
    @include('_content.title',['heading' => 'All Study Groups','body' => 'Click on a group below to see more details.'])
    @if($group_list->isEmpty())
        <em>No groups added. {!! link_to('study_group/create','Click here to add some study groups.') !!} </em>
    @else
        @foreach($group_list as $group)
            @include('_tiles.new-tile',[
        'url' => 'study_group/' . $group->id,
        'column_size' => 'col-md-12',
        'color' => 'alert',
        'icon' => 'home',
        'title' => $group->name,
        'body' => 'Lead by: ' . $group->leader->getFullName()
        ])
        @endforeach
    @endif


    @include('_tiles.end-new-tiles')





@stop

