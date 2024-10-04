<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;// Import the Auth facade
use App\Models\Formation; // Assuming the model name is Course
use Barryvdh\DomPDF\PDF;

class PDFController extends Controller
{
    public function exportPDF(PDF $pdf)
    {
        // Fetch only the courses belonging to the authenticated user
        $user = Auth::user();
        $courseFormateur = $user->formations;

        // Load the view and pass the data
        $pdf->loadView('courcess', compact('courseFormateur'));

        // Download the PDF file
        return $pdf->stream();
    }
}
