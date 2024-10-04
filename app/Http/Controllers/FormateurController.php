<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormateurController extends Controller
{
    public function ajouter()
    {
        return view('ajouterFormationForm');
    }
}
