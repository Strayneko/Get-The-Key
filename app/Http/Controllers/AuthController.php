<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //TODO: show login form
    public function login()
    {
        return view('auth.auth');
    }

    // TODO: register user
}
