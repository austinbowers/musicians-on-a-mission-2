<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('pages.membership.index');
    }

    public function checkout()
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $priceId = 'price_1MdnbCG0Iov7iIwN87fTr3Fp';

        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price' => $priceId,
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'success_url' =>  route('success'),
            'cancel_url' => route('membership'),
        ]);

        return redirect()->away($checkout_session->url);
    }
}
