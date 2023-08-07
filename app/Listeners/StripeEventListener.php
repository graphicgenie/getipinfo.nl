<?php

namespace App\Listeners;

use App\Models\User;
use Laravel\Cashier\Events\WebhookHandled;
use Stripe\Invoice;

class StripeEventListener
{
    /**
     * Handle the event.
     */
    public function handle(WebhookHandled $event): void
    {
        switch ($event->payload['type']) {
            case 'customer.subscription.created':
            case 'customer.subscription.updated':
                $invoice = Invoice::constructFrom($event->payload['data']['object']);
                $user = User::where('stripe_id', $invoice->customer)->firstOrFail();
                $user->credits = config('subscriptions.' . $user->subscription()->getAttribute('stripe_price') . '.credits');
                $user->save();
                break;
//            case 'customer.subscription.deleted':
//                $invoice = Invoice::constructFrom($event->payload['data']['object']);
//                $user = User::where('stripe_id', $invoice->customer)->firstOrFail();
//                $user->credits = 0;
//                $user->save();
//                break;
        }
    }
}
