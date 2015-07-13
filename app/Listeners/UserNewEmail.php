<?php

namespace App\Listeners;

use App\Events\UserNew;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class UserNewEmail
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
     * @param  UserNew  $event
     * @return void
     */
    public function handle(UserNew $event)
    {
        $user = $event->user;

//        Mail::send('emails.user-new',['user' => $user],function($email) use ($user) {
//            $email->to($$user->member->email,$user->member->getFullName())->subject('Welcome to SIF!');
//        });
    }
}
