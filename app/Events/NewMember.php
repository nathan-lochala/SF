<?php

namespace App\Events;

use App\Events\Event;
use App\Member\Member;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewMember extends Event
{
    use SerializesModels;

    /**
     * Member Object Representing a New Member
     *
     * @var
     */
    public $member;

    /**
     * Create a new event instance.
     *
     * @param Member $member
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
