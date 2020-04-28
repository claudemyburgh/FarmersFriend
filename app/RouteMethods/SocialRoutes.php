<?php


namespace App\RouteMethods;


class SocialRoutes
{

    public function social()
    {
        return function() {
            $this->get('login/{service}', 'Auth\SocialLoginController@redirect');
            $this->get('login/{service}/callback', 'Auth\SocialLoginController@callback');
        };
    }


}
