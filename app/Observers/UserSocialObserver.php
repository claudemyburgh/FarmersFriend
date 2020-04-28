<?php

namespace App\Observers;

use App\UserSocial;

class UserSocialObserver
{

    /**
     * @param UserSocial $userSocial
     */
    public function created(UserSocial $userSocial)
    {
        $this->handleRegisterdEvent('created', $userSocial);
    }

    /**
     * @param $event
     * @param UserSocial $userSocial
     */
    protected function handleRegisterdEvent($event, UserSocial $userSocial)
    {
        $class = config("social.events.{$userSocial->service}.{$event}", null);

        if($class === null) {
            return ;
        }

        event(new $class($userSocial->user()->first()));
    }





}
