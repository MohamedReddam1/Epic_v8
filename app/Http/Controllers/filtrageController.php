<?php

namespace App\Http\Controllers;

use App\Models\formation;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class filtrageController extends Controller
{
    public function filterMinMax(Request $request)
    {
        $min = $request->input('min');
        $max = $request->input('max');
        $courses = Formation::whereBetween('prix', [$min, $max])->get();
        return view('filter', ['courses' => $courses]);
    }
    public function filterRating(Request $request)
    {
        $rating = $request->input('rating');
        $courses = Formation::whereBetween('rate', [$rating, $rating + 0.99])->get();

       

        
        return view('filter', ['courses' => $courses]);
    }
    public function filtrerniveau(Request $r)
    {
        $niveau = $r->input('niveau');
        $courses = Formation::where('niveau', $niveau)->get();
        return view('filter', ['courses' => $courses]);
    }
    public function filtrerLangue(Request $r)
    {
        $langue = $r->input('langue');
        $courses = Formation::where('langue', $langue)->get();
        return view('filter', ['courses' => $courses]);
    }
    public function populairecourses()
    {
        $courses = Formation::leftJoin('orders', 'formations.id', '=', 'orders.id_formation')
            ->select('formations.id', 'formations.titre', 'formations.prix', 'formations.image', DB::raw('count(orders.id_formation) as order_count'))
            ->groupBy('formations.id', 'formations.titre', 'formations.prix', 'formations.image')
            ->orderByDesc('order_count')
            ->get();
        return view('filter', ['courses' => $courses]);
    }
    public function newestcourses()
    {
        $courses = Formation::orderByDesc('created_at')->get();
        return view('filter', ['courses' => $courses]);
    }
}
