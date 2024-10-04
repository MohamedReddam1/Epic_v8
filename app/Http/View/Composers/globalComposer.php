<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class GlobalComposer
{
    public function compose(View $view)
    {
        $user = Auth::user();

        // Eager load the wishlists relation
        $wishlistCount = $user ? $user->load('wishlists')->wishlists->count() : 0;

        $view->with('wishlistCount', $wishlistCount);
    }
}
