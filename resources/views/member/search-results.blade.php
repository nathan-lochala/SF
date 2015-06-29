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
   'title' => 'Search Results',
   'panel_class' => '',
   'panel_heading_class' => '',
   'panel_body_class' => '',
   'color' => 'info',
   'icon' => 'fa fa-search'
   ])

@foreach($results as $name => $collections)
    <h3>Results By - {{ $name }}</h3>
    @if($collections->isEmpty())
        <em>No Results Found</em>
        @else
                <!-- TABLE OF FirstName Results -->
        @include('_tables.new-table',['id' => 'first_name', 'table_head' => ['ID','First Name','Last Name','Email','Mobile','']])
        @foreach($collections as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->first_name }}</td>
                <td>{{ $member->last_name }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->mobile }}</td>
                <td><a style="width: 25%;" href="{{ url('#') }}">
                        @include('_buttons.click-button',[
                            'size' => 'xs',
                            'color' => 'system',
                            'text' => 'View Member',
                            'icon' => 'fa fa-folder-open-o'
                        ])
                    </a></td>
            </tr>
        @endforeach
        @include('_tables.end-new-table')
    @endif
@endforeach

@include('_panels.end-new-panel')

{{--------------------------------------------------------------------------------}}
{{--------------------------------------------------------------------------------}}
@include('_panels.end-new-column')
@include('_panels.end-new-row')
@include('_panels.end')

