<?php 
 
namespace App\Http\Controllers; 
 
use App\Http\Requests\AddCourseValidation; 
use App\Models\Formation; 
use App\Models\Pendingformation; 
use App\Models\PendingVideo; 
use App\Models\User; 
use App\Models\Video; 
use Illuminate\Http\Request; 
use Illuminate\Notifications\Notification; 
use Illuminate\Support\Facades\Auth; 
 
class RController extends Controller 
{ 
    /** 
     * Display a listing of the resource. 
     */ 
    public function index() 
    { 
        // Your index method logic here 
    } 
 
    /** 
     * Show the form for creating a new resource. 
     */ 
 
    public function create() 
    { 
        // Get the current authenticated user ID 
        $id_user = auth()->user()->id; 
 
        // Fetch all pending formations for the user 
        $pendingFormations = Pendingformation::where('id_user', $id_user)->get(); 
 
        // Initialize the variable to hold the pending formation ID and title 
        $id_pendingformation = null; 
        $title = null; 
 
        foreach ($pendingFormations as $formation) { 
            // Count the number of associated pending videos 
            $nombrevideos = Pendingvideo::where('id_pendingformation', $formation->id)->count(); 
 
            // Update the formation with the correct number of videos 
            $formation->nombre_videos = $nombrevideos; 
 
            // Check if there are videos and set the status accordingly 
            if ($nombrevideos > 0) { 
                $formation->status = Pendingformation::UNDER_REVIEW_STATUS; 
            } else { 
                $formation->status = Pendingformation::NO_CONTENT_YET_STATUS; 
            } 
 
            // Save the updated formation instance 
            $formation->save(); 
 
            // Check if there is any pending formation with nombre_videos = 0 
            if ($formation->nombre_videos == 0) { 
                // If found, set the ID and title, and break the loop 
                $id_pendingformation = $formation->id; 
                $title = $formation->titre; 
                break; 
            } 
        } 
 
        // If there is a pending formation with nombre_videos = 0, return a different view 
        if (!is_null($id_pendingformation)) { 
            return view('toAddvideos', ['id_pendingformation' => $id_pendingformation, 'title' => $title]); 
        } 
 
        // Otherwise, return the default view 
        return view('ajouterFormationForm'); 
    } 
 
    public function store(AddCourseValidation $request) 
    { 
        // Validate the incoming request data 
        $validatedData = $request->validated(); 
 
        // Get the validated data 
        $title = $validatedData['title']; 
        $price = $validatedData['price']; 
        $category = $validatedData['category']; 
        $description = $validatedData['description']; 
        $level = $validatedData['level'];  // New field 
        $langue = $validatedData['langue'];  // New field 
        $image = $request->file('image')->getClientOriginalName(); 
        $id_user = auth()->user()->id; 
 
        // Create a new Pendingformation instance 
        $formation = new Pendingformation(); 
        $formation->titre = $title; 
        $formation->prix = $price; 
        $formation->categorie = $category; 
        $formation->description = $description; 
        $formation->niveau = $level;  // Save the new field 
        $formation->langue = $langue;  // Save the new field 
        $formation->image = $image; 
        $formation->id_user = $id_user; 
 
        // Move the uploaded file to the desired location 
        $request->file('image')->move(public_path('F_images'), $image); 
 
        // Save the Pendingformation instance 
        $formation->save(); 
 
        // Count the number of associated pending videos after saving the formation 
        $nombrevideos = Pendingvideo::where('id_pendingformation', $formation->id)->count(); 
 
        // Update the formation with the correct number of videos 
        $formation->nombre_videos = $nombrevideos; 
 
        // Check if there are videos



      
        if ($nombrevideos > 0) { 
            $status = Pendingformation::UNDER_REVIEW_STATUS; 
        } else { 
            $status = Pendingformation::NO_CONTENT_YET_STATUS; 
        } 
        $formation->status = $status; 
 
        // Save the updated formation instance 
        $formation->save(); 
 
 
 
 
 
 
        //send notification 
        $useerNotificated = User::find($id_user); 
        $notification = new \App\Models\Notification(); 
        $notification->id_user = $id_user; 
 
        if ($status == Pendingformation::UNDER_REVIEW_STATUS) { 
            $notification->content = 'Hello ' . $useerNotificated['name'] . ', for quality control rules your course ' . $title . ' is now under admins review, you will be informed of developments soon'; 
        } else { 
            $notification->content = 'Hello ' . $useerNotificated['name'] . ', we are waiting for you to upload content on your course ' . $title; 
        } 
 
        $notification->save(); 
 
 
        // Redirect back with success message 
        return view('toAddvideos', ['title' => $title, 'id_pendingformation' => $formation->id]); 
    } 
 
    public function storeAfterValidation(Request $request)
{
    $id = $request->input('id');
    $id_user = $request->input('id_user');

    // Transfer data from pending formation to formations table
    $pendingFormation = Pendingformation::find($id);
    $formation = new Formation();
    $formation->titre = $pendingFormation->titre;
    $formation->prix = $pendingFormation->prix;
    $formation->categorie = $pendingFormation->categorie;
    $formation->description = $pendingFormation->description;
    $formation->niveau = $pendingFormation->niveau;
    $formation->langue = $pendingFormation->langue;
    $formation->image = $pendingFormation->image;
    $formation->nombre_videos = $pendingFormation->nombre_videos;
    $formation->id_user = $pendingFormation->id_user;
    $formation->save();

    // Save videos associated with this formation
    $pendingVideos = PendingVideo::where('id_pendingformation', $id)->get();
    foreach ($pendingVideos as $pendingVideo) {
        $video = new Video();
        $video->titre = $pendingVideo->titre;
        $video->duree = $pendingVideo->duree;
        $video->content = $pendingVideo->content;
        // Associate video with the newly created formation
        $video->id_formation = $formation->id;
        $video->save();
    }

    // Update pending formation status to published
    $pendingFormation->status = Pendingformation::PUBLISHED_STATUS;
    $pendingFormation->save();

    // Send notification to the user
    $userNotified = User::find($id_user);
    $notification = new \App\Models\Notification();
    $notification->id_user = $id_user;
    $notification->content = 'Hello ' . $userNotified['name'] . ', your course ' . $pendingFormation->titre . ' has been successfully published';
    $notification->save();

    return back()->with('success', 'Course published successfully');
}

 
 
    /** 
     * Display the specified resource. 
     */ 
    public function show(string $id) 
    { 
        // Your show method logic here 
    } 
 
    /** 
     * Show the form for editing the specified resource. 
     */ 
    public function edit(string $id) 
    { 
        // Your edit method logic here 
    } 
 
    /** 
     * Update the specified resource in storage. 
     */ 
    public function update(Request $request, string $id) 
    { 
        // Your update method logic here 
    } 
 
    /** 
     * Remove the specified resource from storage. 
     */ 
    public function destroy(string $id) 
    { 
        // Your destroy method logic here 
    } 
}