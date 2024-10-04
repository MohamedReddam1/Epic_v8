<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateUserValidation;
use App\Models\User;
use App\Models\Pendingformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;

class SettingController extends Controller
{
    public function changePassword()
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->get();
        return view('setting', ['user' => $user]);
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('setting')->with('user', $user);
    }

    protected function update(Request $request, string $id)
{
    $validatedData = $request->validate([
        'name' => 'required|min:5',
        'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user = User::find($id);

    if (!$user) {
        return back()->with('error', 'User not found.');
    }

    $name = $request->input('name');
    $image = $user->image; // Default to the current image

    if ($request->hasFile('image')) {
        $imageFile = $request->file('image');
        $imageName = time() . '_' . $imageFile->getClientOriginalName();
        $imageFile->move(public_path('imgs'), $imageName);
        $image = $imageName; // Update with the new image name
    }

    $user->name = $name;
    $user->image = $image;
    $user->save();

    return back()->with('successSaveChanges', 'User updates saved successfully.');
}


    public function resetPassword(Request $request, string $id)
    {
        $user = User::where('id', $id)->get();
        return view('changePassword')->with('user', $user);
    }

    public function reset(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'oldpass' => 'required|min:8',
            'newpass' => 'required|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);

        if (!Hash::check($validatedData['oldpass'], $user->password)) {
            return redirect()->back()->with('error', 'Old password is incorrect');
        }

        $user->password = Hash::make($validatedData['newpass']);
        $user->save();

        return redirect()->back()->with('message', 'Password updated successfully');
    }

    public function sendEmail($id)
    {
        return view('SendEmailVerification')->with('id', $id);
    }

    public function sendVerificationCode(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $verificationCode = rand(100000, 999999);
        Mail::to($request->email)->send(new VerificationCodeMail($verificationCode));

        session(['verification_code' => $verificationCode, 'user_id' => $id]);

        return redirect()->back()->with('message', 'Verification code sent to your email.');
    }

    public function cancelCourse($id) 
    { 
        $pendingFormation = Pendingformation::find($id); 
        $pendingFormation->delete(); 
        return redirect('/ajouter')->with('cancelCourse','Course canceled successfully'); 
    }
}