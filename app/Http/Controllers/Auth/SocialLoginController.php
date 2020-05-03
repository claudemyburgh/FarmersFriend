<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{

    /**
     * SocialLoginController constructor.
     */
    public function __construct()
    {
        $this->middleware(['social', 'guest']);
    }


    /**
     * @param $service
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect($service, Request $request)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * @param $service
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback($service, Request $request)
    {
        try {

            $serviceUser = Socialite::driver($service)->user();

            $user = $this->getExistingUser($serviceUser, $service);

            if(!$user) {
                $user = User::create([
                    'first_name' => $serviceUser->user['given_name'],
                    'last_name' => $serviceUser->user['family_name'],
                    'email' => $serviceUser->getEmail(),
                    'password' => bcrypt($this->randomPassword()),
                    'email_verified_at' => Carbon::now(),
                    'avatar' => $serviceUser->getAvatar()
                ]);
            } else {
                $user->update([
                    'avatar' => $serviceUser->getAvatar()
                ]);
            }

            if($this->needsToCreateSocial($user, $service)) {
                $user->social()->create([
                    'social_id' => $serviceUser->getId(),
                    'service' => $service
                ]);
            }

            Auth::login($user);

            return redirect()->intended();

        } catch (\Exception $e) {

            return redirect()->route('login')->withError('Sorry something went wrong');
        }

    }

    /**
     * @param User $user
     * @param $service
     * @return bool
     */
    protected function needsToCreateSocial(User $user, $service)
    {
        return !$user->hasSocialLinked($service);
    }

    /**
     * @param $serviceUser
     * @param $service
     * @return mixed
     */
    protected function getExistingUser($serviceUser, $service)
    {
        return User::where('email', $serviceUser->getEmail())->orWhereHas('social', function($q) use ($serviceUser, $service) {
            $q->where('social_id', $serviceUser->getId())->where('service', $service);
        })->first();
    }

    /**
     * @param int $num
     * @return string
     */
    protected function randomPassword($num = 10)
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";

        $pass = []; //remember to declare $pass as an array

        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache

        for ($i = 0; $i < $num; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

}
