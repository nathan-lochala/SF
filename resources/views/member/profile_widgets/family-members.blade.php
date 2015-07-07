@include('_panels.new-panel',[
   'panel_id' => $id,
   'title' => 'Family Members',
   'panel_class' => '',
   'panel_heading_class' => '',
   'panel_body_class' => '',
   'color' => 'system',
   'icon' => 'fa fa-home'
   ])

<a style="width: 25%; float:left; bottom: 10px; right: 10px" href="{{ url('family/create/?member_id=' . $member->id) }}">
    @include('_buttons.click-button',[
        'size' => 'xs',
        'color' => 'primary',
        'text' => 'Add Family Members',
        'icon' => 'fa fa-plus'
    ])</a>
<br />
<br />
   @if($member->family == null || $member->family->members->isEmpty())
       <em>No Family Members to Display</em>
   @else
      <!-- TABLE OF MEMBERS -->
      @include('_tables.new-table',['id' => 'family_members', 'table_head' => ['ID','Name','Email','Mobile','']])
          @foreach($member->family->members as $family_member)
              <tr>
                  <td>{!! $family_member->id !!}</td>
                  <td>{!! $family_member->getFullName(false,true) !!}</td>
                  <td>{!! $family_member->email() !!}</td>
                  <td>{{ $family_member->mobile or 'N/A' }}</td>
                  <td style="width: 20%"><a  href="{{ url('member/' . $family_member->id . '/remove_family') }}">
                      @include('_buttons.click-button',[
                          'size' => 'xs',
                          'color' => 'dark',
                          'text' => 'Remove from Family',
                          'icon' => 'fa fa-mail-forward'
                      ])
               </a></td>
              </tr>
          @endforeach
      @include('_tables.end-new-table')
   @endif

@include('_panels.end-new-panel')