<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Stripe\Stripe;
use Stripe\Customer;
use DB;

/**
 * Author Name  :  WeblineIndia  |  https://www.weblineindia.com/
 *
 * For more such software development components and code libraries, visit us at
 * https://www.weblineindia.com/communities.html
 *
 * Our Github URL : https://github.com/weblineindia
 **/
class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {

            // Validate incoming data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', 'confirmed', Password::defaults()],
            ]);

            // Start a database transaction
            DB::beginTransaction();

            // Create user
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            // Create customer on Stripe
            Stripe::setApiKey(config('services.stripe.secret'));

            $customer = Customer::create([
                'email' => $user->email,
                'name' => $user->name,
            ]);

            // Update the user with the Stripe customer ID
            $user->stripe_id = $customer->id;
            $user->save();

            // Commit the transaction
            DB::commit();

            return redirect()->route('login')->with('status', 'Your account has been created! Please log in.');

        } catch (ValidationException $e) {
            // Rollback the transaction if validation fails
            DB::rollBack();

            throw $e;
        } catch (\Exception $e) {
            // Rollback the transaction for any other exception
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
