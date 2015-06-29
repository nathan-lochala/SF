{{--
REQUIRED
$width
$blob
$border
$style

$name
$profile_type
$lead
--}}

<!-- Begin .page-heading -->
<div class="page-heading">
    <div class="media clearfix">
        <div class="media-left pr30">
            @include('_content.photo_blob',[
                'width' => $width,
                'photo_blob' => $blob,
                'border' => $border,
                'style' => $style
                ])
        </div>
        <div class="media-body va-m">
            <h2 class="media-heading">{{ $name }}
                <small> - {{ $profile_type }}</small>
            </h2>
            @if(!empty($lead))
                <p class="lead">{{ $lead }}</p>
            @endif
