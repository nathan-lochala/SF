{{--
REQUIRED
$column_size
$color
$icon
$title
$body

OPTIONAL
$url

--}}

@if(!empty($url))
    <a href="{{ url($url) }}">
@endif
        <div class="col-sm-6 {{ $column_size }}">
            <div class="panel bg-{{ $color }} light of-h mb10">
                <div class="pn pl20 p5">
                    <div class="icon-bg">
                        <i class="fa fa-{{ $icon }}"></i>
                    </div>
                    <h2 class="mt15 lh15">
                        <b>{{ $title }}</b>
                    </h2>
                    <h5 class="text-muted">{{ $body }}</h5>
                </div>
            </div>
        </div>
@if(!empty($url))
    </a>
@endif
