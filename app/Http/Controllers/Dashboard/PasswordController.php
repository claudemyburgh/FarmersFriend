<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilePasswordChangeRequest;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * ListingContactController constructor.
     */
    public function __construct()
    {
        return $this->middleware(['auth:sanctum']);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view ('dashboard.profile.password');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(ProfilePasswordChangeRequest $request)
    {

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->withSuccess('Password Updated successfully');
    }

}
