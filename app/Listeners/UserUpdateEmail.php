<?php

namespace App\Listeners;

use App\Events\UserEdit;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserUpdateEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserEdit  $event
     * @return void
     */
    public function handle(UserEdit $event)
    {
        //
    }
}
