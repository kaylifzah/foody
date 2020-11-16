@extends('layouts.app')

@section('content')
<?php include("header.php"); ?>
<img src="/res/showfood2.jpg" class="topzero banner" style="width:100%;">

<div class="container addblanks">
    <!-- Card -->
    <div class="card promoting-card mx-auto d-block addblanks" style="width: 90%;">

        <!-- Card content -->
        <div class="card-body d-flex flex-row lilzero2 contcaption">
            <div class="bottom-right2">Location: {{$post->location}}</div>

            <!-- Avatar -->
            <img src="{{asset('images/profile/'. $post->profiles->profilepic)}}" class="rounded-circle mr-3"
                height="105px" width="100px" alt="avatar" style="object-fit: cover;">

            <!-- Content -->
            <div class="allzero">
                <!-- Title -->
                <p class="card-title bigcardheader allzero">{{$post->foodName}}</p>
                <!-- Subtitle -->
                <p class="card-text descript allzero">by {{$post->user->name}}</p>
            </div>

        </div>

        <!-- Card image -->
        <div class="view overlay ">
            <img class="card-img-top rounded-0 foodimg mx-auto d-block" style="width: 55%"
                src="{{asset('images/foodpost/'. $post->foodpic)}}" alt="foodforsale">

            {{-- <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a> --}}
        </div>

        <!-- Card content -->
        <div class="card-body banner">
            <!-- Text -->
            <p class="cardheader">S${{$post->price}}</p>
            <p>Available Qty: {{$post->qty}}
                <br>
                Available On: {{ \Carbon\Carbon::parse($post->availDate)->format('l jS F Y')}}</p>

            <p class="descript">{{$post->description}}</p>

            <p>Collection Address: {{$post->address}}, Singapore {{$post->postalCode}} <br>
                Pickup from {{$post->collectTimeFrom}} to {{$post->collectTimeTo}}
            </p>


            @if ($post->user->name == $user->name)
            <a href='/post/delete/{{$post->id}}' class="btn btn-lg btn-secondary viewbutt"><i class="fas fa-trash-alt"></i>
                Delete Entry</a>
            <a href='/post/edit/{{$post->id}}' class="btn btn-lg btn-secondary viewbutt" style="margin-right: 2%"><i
                    class="fas fa-pencil-alt"></i>Edit Entry</a>
            @else
            <a href='/post/comment/{{$post->id}}' class="btn btn-lg btn-secondary viewbutt" style="margin-right: 0px;"><i
                    class="fas fa-pencil-alt"></i>Place Order</a>
            @endif

        </div>


    </div>
    @if (is_array($comments) || is_object($comments))
    @foreach($comments as $comment)

    <table class="tablez somemargin">
        <tr style="padding: 15px">
            <td><img src="{{asset('images/profile/'. $comment->profiles->profilepic)}}" class="rounded-circle mr-3"
                    height="105px" width="100px" alt="avatar" style="object-fit: cover;"></th>
            <td>
                <p class="header allzero">{{$comment->user->name}} purchased {{$comment->purchaseqty}} sets of
                    {{$comment->foodposts->foodName}}</p>
                <p class="descript allzero">ordered on {{$comment->created_at}}</p>
                </th>
        </tr>
    </table>
    @endforeach
    @endif
</div>
@endsection