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
        'url' => 'visitor/statistics?scope=all&title=' . urlencode('All Visitors') . '&description=' . urlencode('Below is the complete list of visitors at SIF.'),
        'column_size' => 'col-md-4',
        'color' => 'info',
        'icon' => 'fa fa-users',
        'title' => $visitor_stats['all_count'],
        'body' => 'Total Visitors'
    ])
    @include('_tiles.new-tile',[
        'url' => 'visitor/statistics?scope=previousSunday&title=' . urlencode('The Previous Sunday\'s Visitors - ' . \Carbon\Carbon::now()->previous(\Carbon\Carbon::SUNDAY)->format('M d')) . '&description=' . urlencode('Below is the complete list of visitors from the previous Sunday at SIF.'),
        'column_size' => 'col-md-4',
        'color' => 'system',
        'icon' => 'fa fa-users',
        'title' => $visitor_stats['previous_count'],
        'body' => 'Previous Sunday\'s Visitors'
    ])
    @include('_tiles.new-tile',[
        'url' => 'visitor/statistics?scope=today&title=' . urlencode('Today\'s Visitors') . '&description=' . urlencode('Below is the complete list of visitors from today at SIF.'),
        'column_size' => 'col-md-4',
        'color' => 'alert',
        'icon' => 'fa fa-users',
        'title' => $visitor_stats['today_count'],
        'body' => 'Today\'s Visitors'
    ])
    @include('_tiles.end-new-tiles')


    @include('_content.title',['heading' => $title,'body' => $description])

    {{--
       panel.new

       panel.row
       panel.column
       panel.panel
       panel.panel


       |----------------------------------|
       |                                  |
       |----------------------------------|

       |----------------------------------|
       |                                  |
       |----------------------------------|


       panel.row
       panel.column
       panel.panel

       panel.column
       panel.panel

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
       'title' => $title,
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'primary',
       'icon' => 'fa fa-users'
       ])

    @if($visitor_stats['list']->isEmpty())
        <em>Nothing to display.</em>
    @else
            <!-- TABLE OF VISITORS -->
        @include('_tables.new-table',['id' => 'visitor_table', 'table_head' => ['Name','Email','Date Attended','']])
        @foreach($visitor_stats['list'] as $visitor)
            <tr>
                <td>{!! $visitor->getFullName(false,false) !!}</td>
                <td>{!! $visitor->email() !!}</td>
                <td>{{ \Carbon\Carbon::parse($visitor->created_at)->format('M d, Y') }}</td>
                <td width="15%">
                    <a href="{{ url('visitor/' . $visitor->id . '/delete') }}">
                        @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'danger',
                            'text' => 'Delete',
                            'icon' => 'fa fa-trash'
                        ])
                    </a>
                </td>
            </tr>
        @endforeach
        @include('_tables.end-new-table')
    @endif

    @include('_panels.end-new-panel')

    {{--------------------------------------------------------------------------------}}
    {{--------------------------------------------------------------------------------}}
    @include('_panels.end-new-column')
    @include('_panels.end-new-row')
    @include('_panels.end')


@stop

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function () {

            $('#visitor_table').DataTable({
                "dom": 'f<"clear">Trtip<"clear">l',
                "tableTools": {
                    "sSwfPath": '{{ asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}'
                }
            });

        });
    </script>
@stop

