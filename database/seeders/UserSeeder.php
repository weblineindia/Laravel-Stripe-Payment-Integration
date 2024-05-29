<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Stripe\Stripe;
use Stripe\Customer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::updateOrCreate(
            [
                'email' => 'john@example.com'
            ],[
                'name' => 'John Doe',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('Newpassword@200'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        // Create customer only when this is a new user created in table
        if ($user->wasRecentlyCreated) {
            // Create customer on Stripe
            Stripe::setApiKey(config('services.stripe.secret'));

            $customer = Customer::create([
                'email' => $user->email,
                'name' => $user->name,
            ]);

            // Update the user with the Stripe customer ID
            $user->stripe_id = $customer->id;
        }

        $user->save();


    }
}
