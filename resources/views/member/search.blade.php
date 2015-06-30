@extends('app')

@section('content')

    @include('_content.title',['heading' => 'Search All Members','body' => 'Search by either - First Name, Last Name, Email, or Mobile'])

    @include('member.search-form')

    @if(isset($results))
        @include('member.search-results')
    @endif

@stop

