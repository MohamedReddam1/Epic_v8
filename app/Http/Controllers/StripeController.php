<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $id_formation = $request->input('id_formation');
        $prix = $request->input('prix');
        $productname = $request->input('productname');
        $totalprice = $request->input('total');
        $two0 = "00";
        $total = "$totalprice$two0";

        if (!$id_formation) {
            return response()->json(['error' => 'id_formation is null'], 400);
        }

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount' => $total,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success', ['id_formation' => $id_formation, 'prix' => $prix]),
            'cancel_url' => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        $id_formation = $request->query('id_formation');
        $prix = $request->query('prix');

        return view('success', compact('id_formation', 'prix'));
    }
}
