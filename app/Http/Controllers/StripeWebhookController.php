<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Event;
use Stripe\Stripe;

/**
 * Author Name  :  WeblineIndia  |  https://www.weblineindia.com/
 *
 * For more such software development components and code libraries, visit us at
 * https://www.weblineindia.com/communities.html
 *
 * Our Github URL : https://github.com/weblineindia
 **/
class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Verify the request is from Stripe
        Stripe::setApiKey(config('services.stripe.secret'));
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');
        $event = null;

        try {
            $event = Event::constructFrom(
                json_decode($payload, true),
                $sig_header,
                config('services.stripe.webhook_secret')
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        // Handle the event
        if ($event->type === 'payment_intent.succeeded') {
            // Handle successful payment
            $paymentIntent = $event->data->object;
            // Example: Update database, send confirmation email, etc.
        } elseif ($event->type === 'payment_intent.payment_failed') {
            // Handle payment failure
            $paymentIntent = $event->data->object;
            // Example: Log error, notify user, etc.
        }

        return response()->json(['success' => true]);
    }
}
