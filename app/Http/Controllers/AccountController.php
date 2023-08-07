<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function show() {
        //        dd(Cashier::stripe()->products->retrieve(auth()->user()->subscription()->items[0]->stripe_product));

        return Inertia::render('Account/Show', [
            'has_subscription' => auth()->user()->subscription()?->active() ?? false,
            'subscription' => auth()->user()->subscription(),
            'subscriptions' => config('subscriptions'),
        ]);
    }
}
