{{--
REQUIRED PARAMETERS
$panel_id = panel's ID
$title = panel title

OPTIONAL PARAMETERS
$panel_class = additions to the panel div
$panel_heading_class = additions to the panel heading div
$panel_body_class = additions to the panel div
$color = panel color
$icon = panel icon

            -------EXAMPLE-------

<!-- Admin-panels -->
            <div class="row">
                <div class="col-md-12 admin-grid">
                    <div class="panel" id="p6">
                        <div class="panel-heading">
                          <span class="panel-icon">
                            <i class="fa fa-star-o"></i>
                          </span>
                            <span class="panel-title"> I'm a Panel with All Options
                            </span>
                        </div>
                        <div class="panel-body">

                            //CONTENT

                        </div>
                    </div>
                </div>
            </div>

--}}


    <div class="panel {{ $panel_class or ''}}"
             @if(!empty($color))
                data-panel-color="panel-{{ $color }}"
             @endif
         id="{{ $panel_id }}">
        <div class="panel-heading {{ $panel_heading_class or '' }}">
                          @if (!empty($icon))
                            <span class="panel-icon">
                                <i class="{{ $icon }}"></i>
                            </span>
                          @endif
                            <span class="panel-title">{{ $title }}
                            </span>
        </div>
        <div class="panel-body {{ $panel_body_class or '' }}">

