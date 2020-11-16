<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Foodpost;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = Auth::user();
        $post = Foodpost::where('id', $id)->first();
        //$comment = Comment::where('foodPost_id','=', $id)->get();
        return view('comment.create', [
            'post' => $post,
            'user' => $user,
            //'comments' => $comment
        ]);
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
    public function storecomment(Request $request)
    {
        $user = Auth::user();
        $myOrder = new Comment();
        $myOrder->buyer_id = $user->id;
        $myOrder->foodPost_id = request('foodPost_id');
        $myOrder->seller_id = request('seller_id');

        $myOrder->purchaseqty = request('purchaseqty');
        $myOrder->pickupTime = request('pickupTime');
        $myOrder->contact = request('contact');
        $myOrder->paymentRef = request('paymentRef');

        $file = request('paymentScreenS');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('images/order/', $filename);
        $myOrder->paymentScreenS = $filename;

        $user = $user->comments()->save($myOrder);

        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
