<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;


class PrivacyPolicyController extends Controller
{
    public function index()
    {
        return view('legal.privacy-policy');
    }
}
