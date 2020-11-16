@extends('layouts.app')

@section('content')
<?php include("header.php"); ?>
<div class="contcaption">
<img src="/res/showfood2.jpg" class="topzero banner" style="width:100%;">
<div class="centre-banner">
    <p>Made a Sale yet?</p>
</div>
</div>

<div class="container addblanks">

    <p class="bigHeader" style="text-align: center;">${{ $post->price}} {{ $post->foodName }}</p>

    <img src="{{asset('images/foodpost/'. $post->foodpic)}}" class="img-thumbnail"
        style="width: 60%; margin:auto; display:block">

    <br>
    @if (is_array($comments) || is_object($comments))
    @foreach($comments as $comment)
    <div class="row justify-content-md-center">
        {{-- <a href="{{ route('post.createfood') }}">Create post</a> --}}
        <div class="card somemargin" style="width: 90%;">
            <div class="row no-gutters">
                
                
                        

                <div class="col-md-3">
                    <img src="{{asset('images/order/'. $comment->paymentScreenS)}}" class="card-img-top"
                        style="height: 250px; object-fit: cover;">
                </div>

                <div class="col-md-9">
                    <div class="card-body">
                        <p class="header"><img src="{{asset('images/profile/'. $comment->profiles->profilepic)}}" class="rounded-circle mr-3"
                        height="60px" width="60px"  style="object-fit: cover; display: inline-block" alt="avatar">
                        {{$comment->user->name}} purchased {{$comment->purchaseqty}}
                            {{$comment->foodposts->foodName}}/s from you</p>
                            <p>Contact No: {{$comment->contact}} |
                                Email add: {{$comment->user->email}}</p>
                        <p>Picking up at: {{$comment->pickupTime}} on
                            {{ \Carbon\Carbon::parse($comment->foodposts->availDate)->format('l jS F Y')}}</p>

                        
                        <p>Payment Ref: {{$comment->paymentRef}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach
    @endif


    {{-- @if (is_array($comments) || is_object($comments))
    @foreach($comments as $comment)
    <div class="row">
        <div class="col-md-3">
            <img src="{{asset('images/profile/'. $comment->profiles->profilepic)}}" class="w-100">
</div>
<div class="col-md-9">
    <h2>{{$comment->user->name}} purchased {{$comment->purchaseqty}} sets of {{$comment->foodposts->foodName}}</h2>
    <p>Picking up at: {{$comment->pickupTime}}</p>
    <p>Contact No: {{$comment->contact}}</p>
    <p>Email add: {{$comment->user->email}}</p>
    <p>Payment Ref: {{$comment->paymentRef}}</p>
</div>
</div>
@endforeach
@endif --}}
</div>
@endsection