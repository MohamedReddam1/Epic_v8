<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;
use App\Mail\TestMail;
use App\Models\formation;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use Termwind\Components\Hr;
use Illuminate\Support\Facades\Mail;
class FeedbackController extends Controller
{
    public function submitFeedback(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|max:255',
        ]);

        // Get the authenticated user's ID
        $userId = Auth::id();



        $review = new Review();
        $id_formation = $request->input('id_formation');
        $review->id_formation = $id_formation; // Assuming you are passing the formation ID with the request
        $review->id_user = $userId;
        $review->rate = $validatedData['rating'];
        $review->feedback = $validatedData['feedback'];
        $review->save();


        //moyenne rating
        $moyenneRate = Review::where('id_formation', $id_formation)->avg('rate');
        $formationRated = Formation::find($id_formation);
        $formationRated->rate = $moyenneRate;
        $formationRated->save();
        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
    public function email(Request $request)
    {
        // Validate the form data
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Prepare the data for the email
        $data = [
            'recipient_email' => 'youssefboughanem55@gmail.com',
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        // Send the email using the TestMail Mailable
        Mail::to($data['recipient_email'])->send(new TestMail($data));

        return back()->with('success', 'Email sent successfully!');
    }
}
