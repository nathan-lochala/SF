<?php

namespace App\Listeners;

use App\Events\NewMember;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class NewMemberEmail
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
        $member = $event->member;
//        Mail::queueOn('email','emails.new-member',['member' => $member],function($email) use ($member) {
//            $email->to($member->email,$member->getFullName())->subject('Welcome to SIF!');
//        });

//        Mail::send('emails.new-member',['member' => $member],function($email) use ($member) {
//            $email->to($member->email,$member->getFullName())->subject('Welcome to SIF!');
//        });
    }
}
