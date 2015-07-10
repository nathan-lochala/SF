<h3>Name</h3>
{{ $group->name }}
<h3>Description</h3>
{{ $group->description }}
<h3>Address</h3>
{{ $group->address }} <br />
{{ $group->district->getFullName() }}
<h3>Meeting Time</h3>
{{ $group->frequency }} <br />
{{ $group->meeting_time }}