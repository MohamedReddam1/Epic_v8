<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = Cart::getContent()->count();
        $formations = Formation::limit(4)->get();
        return view('Homepage/Homepage', ['formations'=> $formations, 'count'=>$count]);
    }

  
}
//
