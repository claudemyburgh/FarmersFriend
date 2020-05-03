<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;

class ProfilePasswordController extends Controller
{
    /**
     *
     */
    public function __constructor()
    {
        $this->middleware(['auth:sanctum']);
    }


    /**
     * @param Request $request
     * @return UserResource
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return new UserResource($user);
    }

    public function store(Request $request)
    {

        dd($request->password);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);
    }


}
