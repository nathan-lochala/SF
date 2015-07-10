<h2>{{$member->getFullName()}}</h2>
<h5>Email: {!! $member->email() !!}</h5>
<h5>Mobile: {{$member->mobile or 'N/A'}}</h5>
<h5>District: {{$member->district->name or 'N/A'}} {{ $member->district->chinese or '' }}</h5>
