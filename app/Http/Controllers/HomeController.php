<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //TODO: homepage
    public function index()
    {
        return view('welcome');
    }
}
