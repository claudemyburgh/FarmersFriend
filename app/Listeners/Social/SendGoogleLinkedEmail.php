<?php

namespace App\Listeners\Social;


use App\Events\Social\GithubAccountWasLinked;
use App\Mail\Social\GoogleAccountLinkedEmail;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendGoogleLinkedEmail
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
     * Handle the event.
     *
     * @param  GithubAccountWasLinked  $event
     * @return void
     */
    public function handle(GithubAccountWasLinked $event)
    {
        Mail::to($event->user)->queue(new GoogleAccountLinkedEmail($event->user));
    }
}
