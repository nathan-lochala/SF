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
{{--------------------------------------------------------------------------------}}
{{------------------------------New Panel ID:1---------------------------------}}
@include('_panels.new-panel',[
   'panel_id' => '1',
   'title' => 'Government Identification Export',
   'panel_class' => '',
   'panel_heading_class' => '',
   'panel_body_class' => '',
   'color' => 'info',
   'icon' => 'share'
   ])

        <!-- TABLE OF Students -->
@include('_tables.new-table',['id' => 'export_table', 'table_head' =>
[
'序号',
'姓名',
'性别',
'国籍',
'出生年月',
'证件类型',
'证件号码',
'签证类型',
'签证号码',
'有效日期',
'监护人姓名',
'证件类型',
'国籍',
'证件号码',
'签证类型',
'签证号码',
'有效日期',
'监护人与学生的关系',
'就读年级',
'在华居住地'
]])
@foreach($list as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->student_name }}</td>
        <td>{{ $item->student_gender }}</td>
        <td>{{ $item->student_country }}</td>
        <td>{{ $item->student_dob }}</td>
        <td>{{ $item->student_id_type }}</td>
        <td>{{ $item->student_id_number }}</td>
        <td>{{ $item->student_visa_type }}</td>
        <td>{{ $item->student_visa_number }}</td>
        <td>{{ $item->student_expiration }}</td>
        <td>{{ $item->parent_name }}</td>
        <td>{{ $item->parent_id_type }}</td>
        <td>{{ $item->parent_country }}</td>
        <td>{{ $item->parent_id_number }}</td>
        <td>{{ $item->parent_visa_type }}</td>
        <td>{{ $item->parent_visa_number }}</td>
        <td>{{ $item->parent_expiration }}</td>
        <td>{{ $item->parent_relationship }}</td>
        <td>{{ $item->student_age_level }}</td>
        <td>{{ $item->address_district }}</td>
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
            $('#export_table').DataTable({
                scrollX: true,
                "dom": 'Tfrtip<"clear">l',
                "tableTools": {
                    "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
                }
            });
        });
    </script>
@stop