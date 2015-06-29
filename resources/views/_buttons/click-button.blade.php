{{--
REQUIRED
$size = Size of the button
$color = Color of the button
$text = Text that shows in the middle of the button

OPTIONAL
$icon = Icon to be displayed on the button
--}}



<button type="button" class="btn btn-{{ $size }} btn-rounded btn-{{ $color }} btn-block">{{ $text }}
@if(!empty($icon))
    <i class="{{ $icon }}"></i>
@endif
</button>