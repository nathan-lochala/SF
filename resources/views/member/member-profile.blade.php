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

    {{--@include('_tiles.new-tiles')--}}
    {{-- Add tiles with tiles.new.tile --}}
    {{--@include('_tiles.new-tile',[--}}
            {{--'url' => 'family/create',--}}
            {{--'column_size' => 'col-md-3',--}}
            {{--'color' => 'system',--}}
            {{--'icon' => 'home',--}}
            {{--'title' => 'Family',--}}
            {{--'body' => 'View Member\'s Family'--}}
    {{--])--}}

    {{--@include('_tiles.new-tile',[--}}
           {{--'url' => 'member/' . $member->id . '/id_card',--}}
           {{--'column_size' => 'col-md-3',--}}
           {{--'color' => 'info',--}}
           {{--'icon' => 'tag',--}}
           {{--'title' => 'ID Card',--}}
           {{--'body' => 'Reprint ID Card'--}}
    {{--])--}}

    {{--@include('_tiles.new-tile',[--}}
           {{--'url' => 'user/' . $member->id . '/create',--}}
           {{--'column_size' => 'col-md-3',--}}
           {{--'color' => 'alert',--}}
           {{--'icon' => 'user',--}}
           {{--'title' => 'User',--}}
           {{--'body' => 'Add member to users.'--}}
    {{--])--}}

    {{--@include('_tiles.new-tile',[--}}
           {{--'url' => 'member/' . $member->id . '/destroy',--}}
           {{--'column_size' => 'col-md-3',--}}
           {{--'color' => 'danger',--}}
           {{--'icon' => 'trash',--}}
           {{--'title' => 'Delete',--}}
           {{--'body' => 'CAUTION: Delete User'--}}
    {{--])--}}
    {{--@include('_tiles.end-new-tiles')--}}
    @include('_content.title',['heading' => $member->getFullName() . ' <small>ID: ' . $member->id . '</small>','body' => 'Member Profile'])

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
        @include('member.profile_widgets.member-details',['id' => 1])
        {{--------------------------------------------------------------------------------}}
        {{--------------------------------------------------------------------------------}}

        {{--------------------------------------------------------------------------------}}
        {{------------------------------New Panel ID:2---------------------------------}}
        @include('member.profile_widgets.family-members',['id' => 2])
        {{--------------------------------------------------------------------------------}}
        {{--------------------------------------------------------------------------------}}

        {{--------------------------------------------------------------------------------}}
        {{------------------------------New Panel ID:3---------------------------------}}
        @include('member.profile_widgets.id-card',['id' => 3])

        {{--------------------------------------------------------------------------------}}
        {{--------------------------------------------------------------------------------}}

        {{--------------------------------------------------------------------------------}}
        {{------------------------------New Panel ID:4---------------------------------}}
        @include('member.profile_widgets.user',['id' => 4])

    {{--------------------------------------------------------------------------------}}
        {{--------------------------------------------------------------------------------}}
    @include('_panels.end-new-column')
    @include('_panels.end-new-row')

    @include('_panels.end')


@stop



