@extends('layouts.app')

@section('content')
<?php include("header.php"); ?>
<div class="contcaption">
<img src="res/profile.jpg" class="mx-auto d-block topzero banner" style="width:100%;">
<div class="centre-banner">
    <p>Profile</p>
</div>
</div>

<div class="container">

    <div class="row justify-content-md-center">

        <div class="card somemargin banner justify-content-md-center" style="width: 50%; min-width:500px;">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img src="{{asset('images/profile/'. $profile->profilepic)}}" class="card-img-top" alt="myfood"
                        style="height: 300px; object-fit: cover;">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <p class="header">{{ $user->name }} <br> {{ $user->email }}
                            <br>Stays at {{$profile->location}}</p>
                        <p class="descript">{{$profile->about}}</p>
                        <div class="pt-3"><a href="/profile/edit">Edit profile ></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p class="bigHeader">Your Sales Posts</p>
    <hr>

    <div class="row justify-content-md-center">
        {{-- <a href="{{ route('post.createfood') }}">Create post</a> --}}
        @foreach($posts as $post)
        <div class="card somemargin" style="width: 90%; min-width:500px">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{asset('images/foodpost/'. $post->foodpic)}}" class="card-img-top"
                        style="height: 250px; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="header">You are selling {{$post->foodName}} at ${{$post->price}}</p>
                        <p>Sales Date:
                            {{$post->availDate}} <br>
                            Prepare by:
                            {{$post->collectTimeFrom}} <br>
                        </p>
                        <a href='/post/{{$post->id}}'>View Post ></a><br>
                        <a href='/orders/{{$post->id}}'>View Your Customer Orders ></a>
                        {{-- <a href="#" class="btn btn-primary stretched-link">View Profile</a> --}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <p class="bigHeader somemargin">Your Purchases</p>
    <hr>

    <div class="row justify-content-md-center">
        @foreach($comments as $comment)
        <div class="card somemargin" style="width: 90%; min-width:500px">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{asset('images/foodpost/'. $comment->foodposts->foodpic)}}" class="card-img-top"
                        alt="myfood" style="height: 260px; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="header"><img src="{{asset('images/profile/'. $comment->profilesSeller->profilepic)}}"
                                class="rounded-circle mr-3" height="60px" width="60px"
                                style="object-fit: cover; display: inline-block" alt="avatar">
                            {{$comment->userSeller->name}} | <span class="smalldescript">{{$comment->userSeller->email}}</span></p>

                        <p class="header">Purchased {{$comment->purchaseqty}} {{$comment->foodposts->foodName}} from the
                            above seller.
                        </p>


                        <p>Collection Timing: {{$comment->pickupTime}} <br>
                            Pickup Address: {{$comment->foodposts->address}}</p>
                        <a href='/post/{{$comment->foodposts->id}}'>View Post ></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection