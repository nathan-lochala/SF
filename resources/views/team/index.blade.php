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
        'column_size' => 'col-md-4',
        'color' => 'info',
        'icon' => 'heart-o',
        'title' => $team_list->count(),
        'body' => 'Total Teams'
])

    @include('_tiles.new-tile',[
        'url' => '#',
        'column_size' => 'col-md-4',
        'color' => 'system',
        'icon' => 'group',
        'title' => \App\Team\Team::allMembersCount(),
        'body' => 'Total Members in All Team'
])
    @include('_tiles.new-tile',[
        'url' => '#',
        'column_size' => 'col-md-4',
        'color' => 'warning',
        'icon' => 'thumbs-o-up',
        'title' => \App\Team\Team::allInterestedMembersCount(),
        'body' => 'Total Interested Members'
])
    @include('_content.title',['heading' => 'All SIF Teams','body' => 'Click on a team below to see more details.'])
    @if($team_list->isEmpty())
        <em>No groups added. {!! link_to('team/create','Click here to add some team.') !!} </em>
    @else
        @foreach($team_list as $team)
            @include('_tiles.new-tile',[
        'url' => 'team/' . $team->id,
        'column_size' => 'col-md-12',
        'color' => 'alert',
        'icon' => 'heart-o',
        'title' => $team->name,
        'body' => 'Lead by: ' . $team->teamLeader->getFullName()
        ])
        @endforeach
    @endif


    @include('_tiles.end-new-tiles')





@stop

