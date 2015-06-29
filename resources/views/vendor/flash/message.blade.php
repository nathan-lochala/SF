@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <div class="alert
         @if(Session::has('flash_notification.important'))
            alert-important
         @endif
         alert-{{ Session::get('flash_notification.level') }} alert-border-left alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>{{ Session::get('flash_notification.message') }}</h4>
        </div>
    @endif
@endif
