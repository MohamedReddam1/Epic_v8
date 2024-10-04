<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function profileuser()
    {
        $id = auth()->user()->id;
        $userprofile = User::where('id', $id)->get();
        return view('profileuser', ['userprofile' => $userprofile]);
    }
}