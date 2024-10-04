<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Pendingformation;
use App\Models\Review;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{

    public function formateur()
    {
        return view('formateur');
    }
    public function wishelist()
    {
        $user_id = auth()->user()->id;

        $newWisheListCount = Notification::where('id_user', $user_id)
            ->count();

        // Fetch the wishlist data for the authenticated user
        $mywishlist = Wishlist::select('formations.*')
            ->join('formations', 'wishlists.id_formation', '=', 'formations.id')
            ->where('wishlists.id_user', $user_id)
            ->get();

        // Get the wishlist count
        $wishlistCount = $mywishlist->count();

        return view('wishelist', [
            'mywishlist' => $mywishlist,
            'newWisheListCount' => $newWisheListCount,
            'wishlistCount' => $wishlistCount
        ]);
    }

    // In your controller
    // Update the model import

    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');

        // Perform the search query
        $courses = Formation::where('titre', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();

        // Pass the filtered courses to the view
        return view('search', ['courses' => $courses, 'query' => $query]);
    }

    public function rateview(Request $request)
    {
        $id = $request->route('id');
        
        // Assuming you have a Course model with an image field
        $course = Formation::find($id);
        
        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }
    
        return view('rateview', ['id' => $id, 'course' => $course]);
    }
    
    public function formateurCourses()
    {
        $id = auth()->user()->id;
        // Execute the query to get the results
        $courseFormateur = Pendingformation::where('id_user', $id)->get();
        // Pass the results to the view
        return view('formateurCourses', ['courseFormateur' => $courseFormateur]);
    }



    public function formateurDashboard()
    {
        // Get the authenticated user's ID
        $id = Auth::user()->id;

        // Fetch orders for courses created by the formateur
        $orders = Order::whereIn('id_formation', function ($query) use ($id) {
            $query->select('id')->from('formations')->where('id_user', $id);
        })->get();

        // Calculate the number of customers who bought the formateur's courses
        $customers = $orders->unique('id_user')->count();

        // Calculate the total earnings from the formateur's courses
        $totalTurns = $orders->sum('montant_paye');

        // Calculate the profit (assuming percentage is 33%)
        $percentage = 33;
        $profits = ($percentage / 100) * $totalTurns;

        // Get the courses created by the formateur
        $courseFormateur = Formation::where('id_user', $id)->get();

        // Pass the results to the view
        return view('FormateurDashboard/FormateurDashboard', [
            'courseFormateur' => $courseFormateur,
            'customers' => $customers,
            'totalTurns' => $totalTurns,
            'profits' => $profits
        ]);
    }



    public function courses()
    {

        $courses = Formation::all();
        return view('Courses/courses', ['courses' => $courses]);
    }
    public function notifications()
    {
        $id_user = auth()->user()->id;
        $user = auth()->user()->role;
        // Fetch notifications for the authenticated user ordered by creation date, most recent first
        $notifications = Notification::where('id_user', $id_user)
            ->orderBy('created_at', 'desc')
            ->get();
        // Count unread notifications
        $newNotificationsCount = Notification::where('id_user', $id_user)
            ->whereNull('read_at')
            ->count();

        return view('notifications', [
            'notifications' => $notifications,
            'newNotificationsCount' => $newNotificationsCount,
            'user' => $user
        ]);
    }
    // public function notificationsCount()
    // {
    //     $id_user = auth()->user()->id;
    //     // Count unread notifications
    //     $newNotificationsCount = Notification::where('id_user', $id_user)
    //         ->whereNull('read_at')
    //         ->count();

    //     return response()->json(['count' => $newNotificationsCount]);
    // }


    public function deleteNotification(Request $r)
    {
        // $id = $request->input('id_notification');
        $id_not = $r->route('id');
        $nt = Notification::find($id_not);
        $nt->delete();
        return back();
    }
    public function details($id)
    {
        $courses = Formation::limit(4)->get();
        $formation = Formation::with('user')->findOrFail($id);
        $reviews = Review::with('user')->where('id_formation', $id)->limit(4)->get();
        return view('details', [
            'formation' => $formation,
            'reviews' => $reviews,
            'user' => $formation->user, // Passing the user data to the view
            'courses'=>$courses
        ]);
    }
    public function mycourses()
    {
        // Get the authenticated user's ID
        $userId = auth()->user()->id;

        // Retrieve the courses bought by the user
        $courses = \App\Models\Order::where('id_user', $userId)
            ->with('formation') // Load the formation relationship
            ->get();

        return view('mycourses', [
            'courses' => $courses
        ]);
    }

    public function openmycourse($id_formation)
    {
        $formations = Formation::where('id', $id_formation)->get();
        $videos = Video::where('id_formation', $id_formation)->get();

        return view('openmycourse', [
            'formations' => $formations,
            'videos' => $videos,
        ]);
    }






    // public function showNotifications()
    // {
    //     // Fetch all notifications ordered by creation date, most recent first
    //     $notifications = Notification::orderBy('created_at', 'desc')->get();
    //     $newNotificationsCount = Notification::whereNull('read_at')->count(); // Count unread notifications

    //     return view('notifications', compact('notifications', 'newNotificationsCount'));
    // }
}
