<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class UserProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function store(Request $request){
        $this->validate($request, [
            'address' => 'required|min:100',
            'phone_number' => 'required|min:10|numeric',
            'biography' => 'required|min:200',
            'experience' => 'required|min:200',
        ]);
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'biography' => $request->biography,
            'experience' => $request->experience,
        ]);
        return redirect()->back()->with('message', 'Profile updated successfully');
    }

    public function coverletter(Request $request){
        $this->validate($request, [
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:2000000'
        ]);
        $user_id = auth()->user()->id;
        $cover_letter = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $cover_letter,
        ]);
        return redirect()->back()->with('message', 'Cover letter updated successfully');
    }

    public function resume(Request $request){
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx|max:2000000'
        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'resume' => $resume,
        ]);
        return redirect()->back()->with('message', 'Resume updated successfully');
    }

    public function avatar(Request $request){
        $this->validate($request, [
            'avatar' => 'required|mimes:jpeg,jpg,png|max:2000000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatar/', $filename);
            Profile::where('user_id', $user_id)->update([
                'avatar' => $filename
            ]);
            return redirect()->back()->with('message', 'Profile picture updated successfully');
        }
    }
}
