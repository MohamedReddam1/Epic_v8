<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Pendingformation; 
use App\Models\Pendingvideo; 
use App\Models\User; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Storage; 
 
class UploadController extends Controller 
{ 
    public function storeVideos(Request $request) 
    { 
        $rules = [ 
            'id_pendingformation' => 'required|exists:pendingformations,id' 
        ]; 
 
        foreach ($request->all() as $key => $value) { 
            if (preg_match('/^video_(\d+)_title$/', $key, $matches)) { 
                $index = $matches[1]; 
                $rules['video_' . $index . '_title'] = 'required|string|max:255'; 
                $rules['video_' . $index . '_duration'] = 'required|string'; 
                $rules['video_' . $index . '_content'] = 'required|file|mimes:mp4,pdf'; 
            } 
        } 
 
        $validated = $request->validate($rules); 
 
        foreach ($request->all() as $key => $value) { 
            if (preg_match('/^video_(\d+)_title$/', $key, $matches)) { 
                $index = $matches[1]; 
 
                // Get the corresponding title, duration, and content 
                $title = $request->input('video_' . $index . '_title'); 
                $duree = $request->input('video_' . $index . '_duration'); 
                $content = $request->file('video_' . $index . '_content')->getClientOriginalName(); 
 
 
 
 
                $request->file('video_' . $index . '_content')->move(public_path('videos'), $content); 
 
                // Create a new Pendingvideo instance and save to the database 
                $pendingvideo = new Pendingvideo(); 
                $pendingvideo->titre = $title; 
                $pendingvideo->duree = $duree; 
                $pendingvideo->content = $content; // Save the relative path 
                $pendingvideo->id_pendingformation = $request->input('id_pendingformation'); 
                $pendingvideo->save(); 
            } 
        } 
 
        // Update the number of videos associated with the pending formation 
        $id_pendingformation = $request->input('id_pendingformation'); 
        $nombrevideos = Pendingvideo::where('id_pendingformation', $id_pendingformation)->count(); 
        $formation = Pendingformation::find($id_pendingformation); 
        $formation->nombre_videos = $nombrevideos; 
 
        // Check if there are videos and set the status accordingly 
        if ($nombrevideos > 0) { 
            $formation->status = Pendingformation::UNDER_REVIEW_STATUS; 
        } else { 
            $formation->status = Pendingformation::NO_CONTENT_YET_STATUS; 
        } 
        $formation->save(); 
 
        // Send notification to the user 
        $titre = $formation->titre; 
        $id_user = auth()->user()->id; 
 
        // Find the authenticated user 
        $userNotified = User::find($id_user); 
 
        // Create a new notification 
        $notification = new \App\Models\Notification(); 
        $notification->id_user = $userNotified->id; // Assign the user's ID 
        $notification->content = 'Hello ' . $userNotified->name . ', for quality control reasons, your course ' . $titre . ' is now under admin review. You will be informed of developments soon.'; 
        $notification->save(); 
 
        return view('ajouterFormationForm'); 
    } 
}