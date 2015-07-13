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

    @include('_content.title',['heading' => 'Manage Users','body' => 'Users are those that have access to and can log into the SIF Portal.'])


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
       'title' => 'Active Users',
       'panel_class' => '',
       'panel_heading_class' => '',
       'panel_body_class' => '',
       'color' => 'system',
       'icon' => 'glyphicons glyphicons-keys'
       ])

    @if($user_list->isEmpty())
        <em>No users to display!</em>
    @else
            <!-- TABLE OF USERS -->
        @include('_tables.new-table',['id' => 'user_table', 'table_head' => ['ID','Name','Username','Password','','']])
        @foreach($user_list as $user)
            <tr>
                <td>{{ $user->member->id }}</td>
                <td>{!! $user->member->getFullName(false,true) !!}</td>
                <td>{{ $user->email }}</td>
                <td>*************</td>
                <td width="15%">
                    <a href="{{ url('user/' . $user->id . '/edit') }}">
                        @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'info',
                            'text' => 'Edit',
                            'icon' => 'fa fa-pencil'
                        ])
                    </a>
                </td>
                <td width="15%">
                    <a href="{{ url('user/' . $user->id . '/delete') }}">
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

            $('#user_table').DataTable({
                "dom": 'f<"clear">rtip',
                "tableTools": {
                    "sSwfPath": '{{ asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}'
                }
            });

        });
    </script>
@stop
