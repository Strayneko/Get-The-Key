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
        $validated = Validator::make(request(['email_login', 'password_login']), [
            'email_login' => 'required',
            'password_login' => 'required'
        ]);
        // check validation
        // redirect user with last input and error message to previous page
        if ($validated->fails()) return redirect()->back()->withInput()->withErrors(['errors' => $validated->messages()->all(), 'type' => 'login']);
        // set credentials
        $credentials = [
            'email' => $request->input('email_login'),
            'password' => $request->input('password_login'),
        ];
        // attemp login with validated data
        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withInput()->withErrors(['errors' => ['Username/Password salah!'], "type" => 'login']);
        }
        $request->session()->regenerate();
        // check user roles
        if (Auth::user()->role_id == 1) return redirect()->route('home.index');
        if (Auth::user()->role_id == 3) return redirect()->route('dashboard.transaction.index');
        return redirect()->route('dashboard.product.index');
    }
    // TODO: save user info to database
    public function registration(Request $request)
    {
        // validate user input
        $validated = Validator::make($request->all(), [
            'email'        => 'required|email|min:3|unique:users|max:100',
            'password'     => 'required|min:5',
            'name'    => 'required|min:3|max:50',
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
        // store image
        $validated['picture'] = $request->file('picture')->store('pictures/user/', 'public');
        User::create($validated);
        return redirect()->back()->with('success', 'Registration success! Please login!');
    }
    // TODO: logout user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.auth')->with('success', 'You have successfully logged out!');
    }
}
