<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //TODO: homepage
    public function index()
    {

        return view('home.index');
    }

    // TODO: show form to open shop
    public function openShop()
    {
        // check is user already open the shop
        $shop = Shop::where('user_id', Auth::user()->id)->first();
        if (!empty($shop)) abort(403);
        return view('home.openshop');
    }
    // TODO: show cart
    public function cart()
    {
        return view('home.cart');
    }
}
