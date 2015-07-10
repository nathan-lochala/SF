@include('_panels.new-panel',[
   'panel_id' => $id,
   'title' => 'ID Card',
   'panel_class' => '',
   'panel_heading_class' => '',
   'panel_body_class' => '',
   'color' => 'info',
   'icon' => 'fa fa-tag'
   ])

@if(!$member->idCard || $member->idCard->isEmpty())
    <em>ID Card has not been added to the list. This is probably due to the fact that this member pre-dates the creation of the portal.</em>
    <br />
    <br />
    <a style="width: 25%; float: left; bottom: 10px; right: 10px" href="{{ url('idcard/store?member_id=' . $member->id ) }}">
        @include('_buttons.click-button',[
            'size' => 'xs',
            'color' => 'primary',
            'text' => 'Print ID Card',
            'icon' => 'fa fa-print'
        ])</a>
@else
    <!-- TABLE OF ID CARDS -->
    @include('_tables.new-table',['id' => 'id_card', 'table_head' => ['Added to List','Printed On','Received On','','']])
        @foreach( $member->idCard as $card )
            <tr>
                <td>{{ date('M d, Y',strtotime($card->created_at)) }}</td>
                <td>
                    @if( ! $card->printed_at)
                        <strong><em>Pending...</em></strong>
                    @else
                        {{ date('M d, Y',strtotime($card->printed_at)) }}
                    @endif
                </td>

                <td>
                    @if( ! $card->received_at)
                        <strong><em>Pending...</em></strong>
                    @else
                        {{ date('M d, Y',strtotime($card->received_at)) }}
                    @endif
                </td>
                <td style="width: 25%;">
                    @if( ! $card->received_at)
                        <a href="{{ url('idcard/' . $card->id . '/received') }}">
                            @include('_buttons.click-button',[
                                'size' => 'xs',
                                'color' => 'warning',
                                'text' => 'Mark as Delivered',
                                'icon' => 'fa fa-check'
                            ])</a>
                    @endif
                </td>
                <td style="width: 25%;">
                    <a href="{{ url('idcard/' . $card->id . '/reprint') }}">
                        @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'primary',
                            'text' => 'Re-print ID Card',
                            'icon' => 'fa fa-print'
                        ])</a>
                </td>
            </tr>
        @endforeach
    @include('_tables.end-new-table')
@endif


@include('_panels.end-new-panel')
