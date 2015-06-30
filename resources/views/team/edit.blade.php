@extends('app')

@section('content')
        
        @include('_tiles.new-tiles')
            {{-- Add tiles with tiles.new.tile --}}
            @include('_tiles.new-tile',[
                    'url' => 'team/create',
                    'column_size' => 'col-md-4',
                    'color' => 'system',
                    'icon' => 'fa fa-users',
                    'title' => 'Back',
                    'body' => 'to the team list'
            ])
        @include('_tiles.end-new-tiles')

<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
@include('_forms.new-head',['color' => 'panel-system'])
        <!--UPDATE FORM-->
{!! Form::model($team,['method' => 'PATCH','id' => 'admin-form','url' => 'team/' . $team->id]) !!}
@include('_forms.new-body')
@include('_forms.new-row')
@include('_forms.new-column',['column_size' => 'col-md-12'])

            @include('team.form')
            
@include('_forms.end-new-column')
@include('_forms.end-new-row')
@include('_forms.end-new-body')
@include('_forms.end-new-head',['submit_title' => 'Update','submit_name' => 'submit','submit_id' => 'update'])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->







@stop

