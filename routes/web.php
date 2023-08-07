<?php

use App\Http\Controllers\AccountController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Cashier\Cashier;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return Inertia::render('Landingpage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/stripe-basic', function() {
    if(!auth()->check())
        return redirect(route('register'));

    if(auth()->user()->subscription()?->active())
        return redirect(route('billing-portal'));

    return auth()->user()
        ->newSubscription('default', config('subscriptions.' . env('STRIPE_PROD_BASIC') . '.stripe_id'))
        ->trialDays(8)
        ->checkout();
})->name('stripe-basic');

Route::get('/stripe-standard', function() {
    if(!auth()->check())
        return redirect(route('register'));

    if(auth()->user()->subscription()?->active())
        return redirect(route('billing-portal'));

    return auth()->user()
        ->newSubscription('default', config('subscriptions.' . env('STRIPE_PROD_STANDARD') . '.stripe_id'))
        ->trialDays(8)
        ->checkout();
})->name('stripe-standard');

Route::get('/stripe-business', function() {
    if(!auth()->check())
        return redirect(route('register'));

    if(auth()->user()->subscription()?->active())
        return redirect(route('billing-portal'));

    return auth()->user()
        ->newSubscription('default', config('subscriptions.' . env('STRIPE_PROD_BUSINESS') . '.stripe_id'))
        ->trialDays(8)
        ->checkout();
})->name('stripe-business');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'has_subscription' => auth()->user()->subscription()?->active() ?? false
        ]);
    })->name('dashboard');

    Route::get('/home', function () {
        return Inertia::render('Dashboard');
    })->name('home');

    Route::get('/account', [AccountController::class, 'show'])->name('account');

    Route::get('/security', function () {
        return Inertia::render('Security');
    })->name('security');

    Route::get('/billing-portal', function (Request $request) {
        return \Illuminate\Support\Facades\Auth::user()->redirectToBillingPortal();
    })->name('billing-portal');

});
