<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use File;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $posts = \App\Models\FoodPost::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $comments = Comment::where('buyer_id', $user->id)->get()->sortByDesc("created_at");
        
        return view('profile', [
            'user' => $user,
            'posts' => $posts,
            'profile' => $profile,
            'comments' => $comments
        ]);
    }

    public function createprofile(){
        return view('createProfile', [

            'user' => Auth::user(),
        ]);
    }

    public function storeprofile(Request $request) {

        $data = request()->validate([
            'about' => 'required',
            'profilepic' => ['required', 'image'],
            'location' => 'required',
        ]);

        // create a new profile, and save it
        $user = Auth::user();
        $profile = new Profile();
        $profile->user_id = $user->id;

        $profile->about = request('about');
        $profile->location = request('location');

        if ($request->hasfile('profilepic')) {
            $file = request('profilepic');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/profile/', $filename);
            $profile->profilepic = $filename;
        } else {
            $profile->profilepic = '';
        }

        $store = $profile->save();

        // if it saved, we send them to the profile page
        if ($store) {
            return redirect('/profile');
            //return view('profile', ['fullprofile' => $store]);
        }
        
    }

    public function edit()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('editProfile', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }

    public function update(Request $request)
    {
 
        // Load the existing profile
        $user = Auth::user();
       
        //this is empty and returning null
        $profile = Profile::where('user_id', $user->id)->first();

        if(empty($profile)){
            $profile = new Profile();
            $profile->user_id = $user->id;
        }
 
        $profile->about = request('about');
        $profile->location = request('location');
 
        // Save the new profile pic... if there is one in the request()!
        if ($request->hasfile('profilepic')) {
            $destinationPath = 'images/profile/';
            File::delete($destinationPath. $profile->profilepic);
            $file = request('profilepic');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/profile/', $filename);
            $profile->profilepic = $filename;
        }

        // Now, save it all into the database
        $updated = $profile->save();
        if ($updated) {
            return redirect('/profile');
        }
    }
 
 
 
}
