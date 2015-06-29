{{--
REQUIRED PARAMETERS
$width
$photo_blob

OPTIONAL PARAMETERS
$style
$border

--}}

<img width="{{ $width }}" style="border: {{ $border or 1 }}px solid; {{ $style }};" border="{{ $border or 1 }}px" src="
@if(empty($photo_blob))
    {{ asset('assets/img/Unknown.png') }}
@else
    data:image/png;base64,{!! base64_encode($photo_blob) !!}
@endif
        ">