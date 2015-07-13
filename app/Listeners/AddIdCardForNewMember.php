<?php

namespace App\Listeners;

use App\Events\NewMember;
use App\Member\PrintList;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddIdCardForNewMember
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewMember  $event
     * @return void
     */
    public function handle(NewMember $event)
    {
        PrintList::create([
            'member_id' => $event->member->id
        ]);
    }
}
