<?php

namespace App\Providers;

use App\Events\ListingPaymetCompleted;
use App\Events\Social\GithubAccountWasLinked;
use App\Events\Social\GoogleAccountWasLinked;
use App\Listeners\ClearListingsCache;
use App\Listeners\Social\SendGithubLinkedEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        GithubAccountWasLinked::class => [
            SendGithubLinkedEmail::class
        ],
        GoogleAccountWasLinked::class => [
            SendGoogleLinkedEmail::class
        ],
        ListingPaymetCompleted::class => [
            ClearListingsCache::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
