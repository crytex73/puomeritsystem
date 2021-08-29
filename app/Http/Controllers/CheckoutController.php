<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Compound;

class CheckoutController extends Controller
{

    public function payCompound(Request $request, $compoundid){
        $compound = Compound::find(intval($compoundid));
        return view('checkouts.paycompound', compact('compound'));
    }
    //
    public function createCheckoutSession(Request $request){
        Stripe::setApiKey('sk_test_51JTU8GLO5yddaoIucZsp6Bqnitra4gXlhAhuZLk0Co21hfnNocd71RERC0j5rpl6q5eEr99V0RvWHZnkxf2wK64O00WZZACsTJ'); //try dulu, nanti save dlm config (env).
        header('Content-Type: application/json');

        $checkout_session = Session::create([
           'line_items' => [[
              'price_data' => [
                 'currency' => 'myr',
                 'product_data' => [
                 'name' => 'PUOMeritSystem - Pay Compound',
                 ],
                 'unit_amount' => (float)($request->price) * 100,
              ],
              'quantity' => 1,
           ]],
           'payment_method_types' => [
              'fpx',
              'grabpay',
              'card',
           ],
           'metadata' => [
              'data_key' => $request->dataKey,
           ],
           'mode' => 'payment',
           'success_url' => route('checkout.success'),
           'cancel_url' => route('checkout.cancel'),
           ]);
        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);
    }

    public function success(){
        return view('checkouts.success');
    }

    public function cancel(){
        return view('checkouts.cancel');
    }
}
