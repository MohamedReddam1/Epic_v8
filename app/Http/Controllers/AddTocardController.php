<?php

namespace App\Http\Controllers;

use App\Models\Formation; // Assuming the model name is Formation
use Illuminate\Http\Request;

class AddTocardController extends Controller
{
    public function addToCart($id)
    {
        $formation = Formation::find($id);

        if (!$formation) {
            return redirect()->back()->with('error', 'Formation not found!');
        }

        $cart = session()->get('cart');

        // If cart is empty, initialize it
        if (!$cart) {
            $cart = [
                $id => [
                    "titre" => $formation->titre,
                    "prix" => $formation->prix,
                    "content" => $formation->content,
                    "image" => $formation->image,
                    "description" => $formation->description,
                ]
            ];
        } else {
            // If item already exists in cart, update its quantity
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                // If item is not in cart, add it
                $cart[$id] = [
                    "titre" => $formation->titre,
                    "prix" => $formation->prix,
                    "content" => $formation->content,
                    "image" => $formation->image,
                    "description" => $formation->description,
                ];
            }
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function cart()
    {
        return view('card');
    }

    // public function addToCart($id)
    // {
    //     $formation = Formation::find($id);

    //     // Debugging: Dump $formation object
    //     dd($formation);
    //     session()->flush();

    //     // Rest of your addToCart logic...
    // }
    public function clearCart()
    {
        // Clear the session data
        session()->flush();

        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }
}
