<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Auth;

/**
 * Author Name  :  WeblineIndia  |  https://www.weblineindia.com/
 *
 * For more such software development components and code libraries, visit us at
 * https://www.weblineindia.com/communities.html
 *
 * Our Github URL : https://github.com/weblineindia
 **/
class PaymentController extends Controller
{
    public function process(Request $request)
    {
        try {

            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

            $customerId = Auth::user()->getCustomerId();

            $paymentIntent = $stripe->paymentIntents->create([
                'amount' => 500,
                'currency' => 'usd',
                'payment_method' => 'pm_card_visa',
                'confirmation_method' => 'manual', // Set confirmation method to manual
                'confirm' => true, // Confirm PaymentIntent immediately
                'return_url' => route('stripe.callback'),
                'customer' => $customerId, // Pass the customer ID
            ]);

            // Check status after confirmation
            if ($paymentIntent->status === 'succeeded') {
                // Payment succeeded
                // You may update your database, send confirmation emails, etc.
                return redirect()->back()->with('success', 'Payment successful!');
            } else {
                // Payment failed or needs further action
                // You may need to handle this case accordingly
                return redirect()->with('error', 'Something went wrong!');
            }

        } catch (\Exception $e) {
            return back()->withErrors('Error: ' . $e->getMessage());
        }
    }
}
