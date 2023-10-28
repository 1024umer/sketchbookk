<?php

namespace App\Http\Controllers;

use App\Http\Requests\{OrderRequest,BillingRequest};
use App\Models\{Product,Order};
use Illuminate\Http\Request;
use Stripe;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    public function index(){
        $total = 0;
        $productIds = session('cart', []);
        $products = Product::whereIn('id', $productIds)->with('imageOne','user')->get();
        foreach ($products as $product){
            $total += $product->price;
        }
        return view('dashboard.checkout')->with(compact('products','total'));
    }
    public function stripeCheckout(BillingRequest $request)
    {
        Session::put('email', $request->email);
        Session::put('first_name', $request->first_name);
        Session::put('last_name', $request->last_name);
        Session::put('address', $request->address);
        Session::put('country', $request->country);
        Session::put('city', $request->city);
        Session::put('postal_code', $request->postal_code);
        Session::put('notes', $request->notes);
        Session::put('last_name2', $request->last_name2);
        Session::put('address2', $request->address2);
        Session::put('country2', $request->country2);
        Session::put('city2', $request->city2);
        Session::put('postal_code2', $request->postal_code2);

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $productIds = session('cart', []);
        $products = Product::whereIn('id', $productIds)->with('imageOne', 'user')->get();
        $total = 0;
        foreach ($products as $product) {
            $total += $product->price;
        }

        $checkoutSession = $stripe->checkout->sessions->create([
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.fail'),
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'unit_amount' => ($total + 50) * 100, 
                        'product_data' => [
                            'name' => 'Your Product Name', 
                            'description' => 'Your Product Description', 
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'customer_email' => $request->email, 
        ]);

        Session::put('stripe_checkout_id', $checkoutSession->id);

        return redirect()->away($checkoutSession->url);
    }
    public function stripeSuccess(Request $request){
        $stripe_checkout_id = Session::get('stripe_checkout_id');
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $checkoutSession = $stripe->checkout->sessions->retrieve($stripe_checkout_id, []);

        $productIds = session('cart', []);
        $products = Product::whereIn('id', $productIds)->with('imageOne', 'user')->get();
        foreach ($products as $product) {
            Order::create([
                'product_id' => $product->id,
                'user_id' => $product->user->id,
                'email' => Session::get('email'),
                'first_name' => Session::get('first_name'),
                'last_name' => Session::get('last_name'),
                'address' => Session::get('address'),
                'country' => Session::get('country'),
                'city' => Session::get('city'),
                'postal_code' => Session::get('postal_code'), 
                'notes' => Session::get('notes'), 
                'last_name2' => Session::get('last_name2'), 
                'address2' => Session::get('address2'), 
                'country2' => Session::get('country2'), 
                'city2' => Session::get('city2'), 
                'postal_code2' => Session::get('postal_code2'), 
                'order_id' => 'SKH' . date('YmdHis') .'-'. mt_rand(1000, 9999),
                'stripe_status' => 'done',
                'stripe_checkout_id'=>$stripe_checkout_id,
            ]);
        }
        $request->session()->forget('cart');
        // dd($checkoutSession,$stripe_checkout_id);
        return redirect()->route('shop')->with('complete','Congrats Your Order is in the process, We will let yo know via email');
    }
    public function stripeFail(Request $request){
        $stripe_checkout_id = Session::get('stripe_checkout_id');
        dd($stripe_checkout_id);
        return 'Under Development';
    }
}