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
    @include('_content.title',['heading' => 'Shenzhen International Fellowship <small>Members</small>','body' => 'View all members and access their member dashboard.'])
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
       'title' => 'SIF Members',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'info',
       'icon' => 'fa fa-user'
       ])

        <!-- TABLE OF SIF Members -->
@include('_tables.new-table',['id' => 'members_table', 'table_head' => ['Name','Email','Mobile','','']])
@foreach($member_list as $member)
    <tr>
        <td>{!! $member->getFullName(true,true) !!}</td>
        <td>{!! $member->email() !!}</td>
        <td>{{ $member->mobile }}</td>
        <td style="width: 15%">
            <a href="{{ url('member/' . $member->id) }}">
                @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'system',
                            'text' => 'View Member',
                            'icon' => 'fa fa-folder-open-o'
                        ])
            </a>
        </td>
        <td style="width: 15%"><a href="{{ url('member/' . $member->id . '/delete') }}">
                @include('_buttons.click-button',[
                    'size' => 'xs',
                    'color' => 'danger',
                    'text' => 'Delete',
                    'icon' => 'fa fa-trash'
                ])
            </a></td>
    </tr>
@endforeach
@include('_tables.end-new-table')

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
            $('#members_table').DataTable({
                "dom": 'f<"clear">Trtip<"clear">l',
                "tableTools": {
                    "sSwfPath": "{{ asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}"
                }
            });
        });
    </script>
@stop

