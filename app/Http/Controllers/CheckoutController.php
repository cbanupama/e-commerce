<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $items = Auth::user()->cartItems;

        return view('checkout', compact('items'));
    }
}
