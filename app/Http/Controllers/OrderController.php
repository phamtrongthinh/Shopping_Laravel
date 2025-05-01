<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showCheckoutForm()
    {
        $user = Auth::user();
        return view('frontend.cart', compact('user'));
    }
}
