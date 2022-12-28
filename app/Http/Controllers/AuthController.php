<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //TODO: show auth form
    public function auth()
    {
        return view('auth.auth');
    }

    //TODO: authenticate user
    public function login(Request $request)
    {
        // validate user input
        $validated = Validator::make($request->all(), [
            'username' => 'required',
            'email'    => 'required',
            'password' => 'required'
        ]);
        // check validation
        // redirect user with last input and error message to previous page
        if ($validated->fails()) return redirect()->back()->withInput()->withErrors(['errors', 'type' => 'login']);
        // attemp login with validated data
        if (Auth::attempt($validated->getData())) {
            $request->session()->regenerate();
            return redirect()->intended('home.index');
        }
    }
    // TODO: save user info to database
    public function registration(Request $request)
    {
        // validate user input
        $validated = Validator::make($request->all(), [
            'email'        => 'required|email|min:3|unique:users',
            'username'     => 'required|min:3|unique:users',
            'password'     => 'required|min:5',
            'name'    => 'required|min:3',
            'phone_number' => 'required|min:10:max:13|unique:users',
            'birth_date'   => 'required|date',
            'gender'       => 'required|numeric|digits_between:0,1',
            'address'      => 'required|min:3',
            'picture'      => 'required|file|image|mimes:jpg,png,jpeg'
        ]);
        // redirect user and give feedback message with input
        if ($validated->fails()) return redirect()->back()->withInput()->withErrors(['errors' => $validated->messages()->all(), 'type' => 'register']);
        // get validated data
        $validated = $validated->getData();
        $validated['picture'] = $request->file('picture')->store('pictures/user/', 'public');
        try {
            User::create($validated);
            return redirect()->back()->with('success', 'Registration success! Please login!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors(['errors' => $e->getMessage(), 'type' => "register"]);
        }
    }
}
