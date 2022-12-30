<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\License;

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
    // TODO:show checkout form
    public function checkout($id)
    {
        // get total payment associated with current user login
        $transaction = Transaction::where('id', $id)->where('user_id', Auth::user()->id)->get();
        if (!$transaction) abort(404);
        $transaction = $transaction->first();
        return view('home.checkout', compact('transaction'));
    }

    public function transactions()
    {
        // get all transaction associated with current user login
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('home.transactions', compact('transactions'));
    }

    public function transaction_detail($transaction_id)
    {
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('id', $transaction_id)->get();
        return view('home.transaction_detail', compact('transaction'));
    }

    public function save_transaction($transaction_id)
    {
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('id', $transaction_id)->get();
        $licenses = License::where('transaction_id', $transaction->first()->id)->get();
        $product = Product::find($licenses->first()->product_id);
        $pdf = Pdf::loadView('home.transaction_detail_download', ['transaction' => $transaction, 'product' => $product, 'licenses' => $licenses])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download(uniqid('transaction_', true) . '.pdf');
        // return view('home.transaction_detail_download', ['transaction' => $transaction]);
    }
}
