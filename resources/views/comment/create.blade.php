@extends('layouts.app2')

@section('content')
<?php include("header.php"); ?>
<div class="contcaption">
    <img src="/res/showfood.jpg" class="topzero banner" style="width:100%;">
    <div class="centre-banner">
        <p>Order It!</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">

            <img src="{{asset('images/profile/'. $post->profiles->profilepic)}}"
                class="rounded-circle mr-3 mx-auto d-block" height="105px" width="100px" alt="avatar"
                style="object-fit: cover; margin-bottom: 10px;">

            <p class="bigHeader" style="text-align: center;">${{ $post->price}} {{ $post->foodName }} by
                {{ $post->user->name }}</p>

            <img src="{{asset('images/foodpost/'. $post->foodpic)}}" class="img-thumbnail"
                style="width: 60%; margin:auto; display:block">



            <form action="{{ route('comment.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <br><br>


                <p class="allzero">Recipient Name: {{ $user->name }}</p>
                <p class="allzero">Email: {{ $user->email }}</p>
                <div class="form-group row" style="padding-left: 15px">
                    <label for="contact">Contact No: (+65)</label>
                    <input class="form-control" type="text" pattern="[0-9]{8}" max="99999999" name="contact"
                        id="contact">
                </div>
                <br>

                <input type="hidden" name="foodPost_id" value="{{$post->id}}">
                <input type="hidden" name="seller_id" value="{{$post->user->id}}">

                <p class="allzero" style="font-weight: bold">Available Qty: {{ $post->qty }}</p>
                <div class="form-group row" style="padding-left: 15px">
                {{-- QTY HERE!!!! --}}
                    <label for="purchaseqty">Purchase Qty: </label>
                    <input class="form-control" type="number" name="purchaseqty" id="purchaseqty">
                </div>
                <br>

                <p id="cost" style="font-weight: bold; text-align:center; font-size:25;">Order Total: $<span id="cost2"></span></p>
                {{-- KEY IN TOTAL HERE!!!! --}}


                <p class="descript" style="font-weight: bold; text-align: center;">Please perform a PAYNOW to the
                    following account: {{ $post->payAcc }}</p>

                

                    <div class="form-group col-md-6" style="padding-left: 0px">
                        <label>Upload the screenshot of your payment:&nbsp;</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-secondary btn-file"><input type="file" name="paymentScreenS" id="imgInp">
                                </span>
                            </span>
                        </div>
                        <br>
                        <img id='img-upload'style="width: 100%"/>
                    </div>

                {{-- <div class="form-group row" style="padding-left: 15px">
                    <label for="paymentScreenS">Upload the screenshot of your payment:&nbsp; </label>
                    <input type="file" name="paymentScreenS" id="paymentScreenS">
                </div> --}}

                <div class="form-group row" style="padding-left: 15px">
                    <label for="paymentRef">Enter Payment Ref:</label>
                    <input class="form-control" type="text" pattern="[0-9]{8}" max="99999999" name="paymentRef"
                        id="paymentRef">
                </div>
                <br>

                <p class="allzero" style="font-weight: bold">Collection Timing: {{ $post->collectTimeFrom }} to
                    {{ $post->collectTimeTo }}</p>
                <p class="allzero" style="font-weight: bold">Address: {{ $post->address }}, Singapore
                    {{ $post->postalCode }}</p>
                <div class="form-group row" style="padding-left: 15px">
                    <label for="pickupTime">Approx. Pick-Up Time:</label>
                    <input class="form-control" type="time" name="pickupTime" id="pickupTime">
                </div>

                <div class="form-group row float-right" style="padding-left: 15px">
                    <button type="submit" class="btn btn-lg btn-secondary viewbutt ">Place Order!</button>
                </div>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>

@endsection

</html>