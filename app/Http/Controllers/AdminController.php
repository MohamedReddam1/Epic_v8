<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Pendingformation;
use App\Models\PendingVideo;
use App\Models\Pendingvideos;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $pendingcourses = Pendingformation::all();
        return view('espaceadmin', ['pendingcourses' => $pendingcourses]);
    }


    public function verify(Request $request, $id)
    {
        $course = PendingFormation::find($id);

        $videos = PendingVideo::where('id_pendingformation', $id)->get();

        return view('verify', [
            'course' => $course,
            'videos' => $videos
        ]);
    }

    public function verifyVideos(Request $r)
    {
        $id_video = $r->route('id_video');
        $pendingvideo = PendingVideo::where('id_video', $id_video)->get();
        return view('verifyVideos', ['pendingvideo' => $pendingvideo]);
    }



    public function refuser(Request $request)
    {
        $id = $request->route('id');
        $id_user = $request->route('id_user');
        $userNotificated = User::find($id_user);
        $pendingRefuser = Pendingformation::find($id);
        $pendingRefuser->status = Pendingformation::REJECTED_STATUS;
        $pendingRefuser->save();


        $notification = new Notification();
        $notification->id_user = $id_user;
        $notification->content = 'Hello ' . $userNotificated['name'] . ',your course ' . $pendingRefuser['titre'] . ' has rejected by our admins, if you need to know more about this reject contact us on email';
        $notification->save();
        return back()->with('successReject','Course rejected successfully');
    }
}
