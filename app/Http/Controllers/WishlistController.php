<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;


class WishlistController extends Controller
{
    public function addToWishlist(Request $request)
    {
        // Validate the request data
        $request->validate([
            'formation_id' => 'required', // Ensure that formation_id is present and not null
        ]);

        // Get user_id from authenticated user
        $user_id = auth()->user()->id;

        // Get formation_id from the request
        $formation_id = $request->input('formation_id');
        // Check if the wishlist entry already exists
        $existingEntry = Wishlist::where('id_user', $user_id)
            ->where('id_formation', $formation_id)
            ->exists();

        // If the entry does not exist, insert it into the wishlists table

        if (!$existingEntry) {
            DB::transaction(function () use ($user_id, $formation_id) {
                Wishlist::create([
                    'id_user' => $user_id,
                    'id_formation' => $formation_id,
                ]);
            });
        } else {
            DB::transaction(function () use ($user_id, $formation_id) {
                Wishlist::where('id_user', $user_id)
                    ->where('id_formation', $formation_id)
                    ->delete();
            });
        }



        // Return a success response
        return back();
    }
    public function destroy(Request $request)
    {
        $user_id = auth()->user()->id;
        $formation_id = $request->input('formation_id');


        DB::transaction(function () use ($user_id, $formation_id) {
            Wishlist::where('id_user', $user_id)
                ->where('id_formation', $formation_id)
                ->delete();
        });
        return back();
    }
}
