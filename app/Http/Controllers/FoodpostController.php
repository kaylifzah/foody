<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Foodpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Database\Eloquent\Model;

class FoodpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("post.createFood");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storefood(Request $request)
    {
        // $data = request()->validate([
        //     'foodName' => 'required',
        //     'foodpic' => ['required', 'image'],
        // ]);

        $user = Auth::user();
        $myFood = new Foodpost();
        $myFood->user_id = $user->id;

        $myFood->foodName = request('foodName');
        $myFood->price = request('price');
        $myFood->qty = request('qty');
        $myFood->description = request('description');
        $myFood->location = request('location');
        $myFood->address = request('address');
        $myFood->postalCode = request('postalCode');
        $myFood->availDate = request('availDate');
        $myFood->collectTimeFrom = request('collectTimeFrom');
        $myFood->collectTimeTo = request('collectTimeTo');
        $myFood->payAcc = request('payAcc');


        $file = request('foodpic');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('images/foodpost/', $filename);
        $myFood->foodpic = $filename;

        $user = $user->foodposts()->save($myFood);
        //$saved = $myFood->save();

        //if ($saved) {
        return redirect('/profile');
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foodpost $foodpost
     * @return \Illuminate\Http\Response
     */
    public function showfood($id)
    {
        $user = Auth::user();
        $post = Foodpost::where('id', $id)->first();
        $comments = Comment::where('foodPost_id', $id)->get()->sortByDesc("created_at");

        return view('post.showFood', [
            'post' => $post,
            'user' => $user,
            'comments' => $comments
        ]);
    }

    public function showorder($id)
    {
        $user = Auth::user();
        $post = Foodpost::where('id', $id)->first();
        $comments = Comment::where('foodPost_id', $id)->get()->sortByDesc("created_at");

        return view('showorder', [
            'post' => $post,
            'user' => $user,
            'comments' => $comments
        ]);
    }


    // public function showAllfood(){
    //     $users = User::all()->sortByDesc("created_at");
    //     return view('post.showAllFood', compact('users'));
    // }

    public function showAllfood()
    {
        $posts = Foodpost::all()->sortBy("availDate");
        return view('startordering', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foodpost  $foodpost
     * @return \Illuminate\Http\Response
     */
    public function editfood($id)
    {
        $post = Foodpost::find($id);
        return view('post.editfood', ['desc' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foodpost  $foodpost
     * @return \Illuminate\Http\Response
     */
    public function updatefood(Request $request)
    {
        $user = Auth::user();
        $update = Foodpost::find($request->id);

        $update->foodName = request('foodName');
        $update->price = request('price');
        $update->qty = request('qty');
        $update->description = request('description');
        $update->location = request('location');
        $update->address = request('address');
        $update->postalCode = request('postalCode');
        $update->availDate = request('availDate');
        $update->collectTimeFrom = request('collectTimeFrom');
        $update->collectTimeTo = request('collectTimeTo');
        $update->payAcc = request('payAcc');


        if ($request->hasfile('foodpic')) {
            $destinationPath = 'images/foodpost/';
            File::delete($destinationPath. $update->foodpic);
            $file = request('foodpic');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/foodpost/', $filename);
            $update->foodpic = $filename;
        }

        $user = $user->foodposts()->save($update);
        //$saved = $myFood->save();

        //if ($saved) {
        return redirect('/profile');
        //}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foodpost  $foodpost
     * @return \Illuminate\Http\Response
     */
    public function deletefood($id){
        $delete = Foodpost::find($id);
    	$destinationPath = 'images/foodpost/';
        File::delete($destinationPath. $delete->foodpic);
    	$deleted = $delete->delete();

    	if($deleted){
    		return redirect('profile');
        }
    }
}
