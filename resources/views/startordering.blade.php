@extends('layouts.app')

@section('content')
<?php include("header.php"); ?>
<div class="contcaption">
<img src="res/order.jpg" class="mx-auto d-block topzero" style="width:100%; margin-bottom:40px">
<div class="centre-banner">
    <p>Sales Listing</p>
</div>
</div>

<div class="container-fluid">
    <div class="row" style="padding-right: 0; padding-left: 0; margin-right:0; margin-left:0;">
        @foreach($posts as $post)
        <div class="col-sm-6 col-md-4 banner">
            <!-- Card -->
            <div class="card promoting-card">

                <!-- Card content -->
                <div class="card-body d-flex flex-row lilzero">

                    <!-- Avatar -->
                    <img src="{{asset('images/profile/'. $post->profiles->profilepic)}}" class="rounded-circle mr-3"
                        height="60px" width="60px"  style="object-fit: cover;" alt="avatar">

                    <!-- Content -->
                    <div class="allzero">
                        <!-- Title -->
                        <p class="card-title cardheader allzero">{{$post->foodName}}</p>
                        <!-- Subtitle -->
                        <p class="card-text smalldescript allzero">by {{$post->user->name}}</p>
                    </div>

                </div>

                <!-- Card image -->
                <div class="view overlay contcaption">
                    <img class="card-img-top rounded-0" src="{{asset('images/foodpost/'. $post->foodpic)}}"
                        alt="foodforsale">
                    <div class="bottom-right">{{$post->location}}</div>
                    {{-- <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a> --}}
                </div>

                <!-- Card content -->
                <div class="card-body">
                    <!-- Text -->
                    <p class="cardheader">
                        S${{$post->price}} 
                    <a class="btn btn-secondary viewbutt" href='/post/{{$post->id}}' role="button">View / Order</a></p> 
                    <p>Available Qty: {{$post->qty}}
                        <br>

                        <span style="font-style: italic">for {{ \Carbon\Carbon::parse($post->availDate)->format('l jS F Y')}}</span></p>
                </div>

            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection