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

    @include('_content.title',['heading' => 'Export List','body' => 'The below table represents all the members who are currently waiting to get their ID Cards printed.'])

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
       'title' => 'Print List',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'info',
       'icon' => 'fa fa-print'
       ])

    @if($print_list->isEmpty())
        <em>There are no ID Cards ready to be printed.</em>
    @else
            <!-- TABLE OF ID CARDS -->
        @include('_tables.new-table',['id' => 'print_table', 'table_head' => ['id','first_name','last_name']])
        @foreach($print_list as $idcard)
            <tr>
                <td>{{ $idcard->member->id }}</td>
                <td>{{ $idcard->member->first_name }}</td>
                <td>{{ $idcard->member->last_name }}</td>
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
        $(document).ready(function () {
            $('#print_table').DataTable({
                "dom": 'f<"clear">Trtip<"clear">l',
                "tableTools": {
                    "sSwfPath": '{{ asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}'
                }
            });
        });
    </script>
@stop



