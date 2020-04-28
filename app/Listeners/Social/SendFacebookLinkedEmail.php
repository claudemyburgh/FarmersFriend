<?php

namespace App\Listeners\Social;


use App\Events\Social\FacebookAccountWasLinked;
use App\Mail\Social\FacebookAccountLinkedEmail;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendFacebookLinkedEmail
{

    /**
     * Create the event listener.
     *
     * @param User $user
     */
    public function __construct()
    {

    }


    /**
     * @param FacebookAccountWasLinked $event
     */
    public function handle(FacebookAccountWasLinked $event)
    {
        Mail::to($event->user)->queue(new FacebookAccountLinkedEmail($event->user));
    }
}
