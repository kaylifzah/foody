@extends('layouts.app')

@section('content')
<?php include("header.php"); ?>
<img src="/res/selling.jpg" class="topzero" style="width:100%; margin-bottom:0px">

<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">

            <form action="{{ route('post.storeedits') }}" enctype="multipart/form-data" method="post">
                @csrf
                <br><br>

                <div class="form-group row" style="padding-left: 15px">
                    <label for="foodName">What food are you selling: </label>
                    <input class="form-control" type="text" name="foodName" id="foodName" value="{{$desc->foodName}}">
                </div>

                <div class="form-group col-md-6" style="padding-left: 0px">
                    <label>Upload your food image. &nbsp;</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-secondary btn-file"><input type="file" name="foodpic" id="imgInp">
                            </span>
                        </span>
                    </div>
                    <br>
                    <img id='img-upload'style="width: 100%" src="images/foodpost/{{$desc->foodpic}}"/>
                </div>

                <div class="form-group row" style="padding-left: 15px">
                    <label>Price SGD$</label>
                        <input class="form-control" type="number" placeholder="0" name="price" min="0" value="{{$desc->price}}" step="0.01"
                            title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
                        this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'
                        ">
                </div>

                <div class="form-group row" style="padding-left: 15px">
                    <label for="qty">Available Quantity: </label>
                    <input class="form-control" type="number" name="qty" id="qty" value="{{$desc->qty}}">
                </div>
                <br>
                <div class="form-group row" style="padding-left: 15px">
                    <label for="description">Description: </label>
                    <input class="form-control" type="text" name="description" id="description"
                        value="{{$desc->description}}">
                </div>
                <br>

                <p class="allzero">Location: </p>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="location" value="sembawang"
                            {{ ($desc->location=="sembawang")? "checked" : "" }}>Sembawang
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="location" value="woodlands"
                            {{ ($desc->location=="woodlands")? "checked" : "" }}>Woodlands
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="location" value="yishun"
                            {{ ($desc->location=="yishun")? "checked" : "" }}>Yishun
                    </label>
                </div>

                <div class="form-group row" style="padding-left: 15px; margin-top: 5px;">
                    <label for="address">Address: </label>
                    <input class="form-control" type="text" name="address" id="address" value="{{$desc->address}}">
                </div>

                <div class="form-group row" style="padding-left: 15px">
                    <label for="postalCode">Postal Code: </label>
                    <input class="form-control" type="text" pattern="[0-9]{6}" max="999999" name="postalCode"
                        id="postalCode" value="{{$desc->postalCode}}">
                </div><br>

                <div class="form-group row" style="padding-left: 15px">
                    <label for="availDate">Availability Date: </label>
                    <input class="form-control" type="date" name="availDate" id="availDate"
                        value="{{$desc->availDate}}">
                </div>

                <div class="form-group row" style="padding-left: 15px">
                    <label for="collectTimeFrom">Collection timing from: </label>
                    <input class="form-control" type="time" name="collectTimeFrom" id="collectTimeFrom"
                        value="{{$desc->collectTimeFrom}}">
                </div>

                <div class="form-group row" style="padding-left: 15px">
                    <label for="collectTimeTo">to: </label>
                    <input class="form-control" type="time" name="collectTimeTo" id="collectTimeTo"
                        value="{{$desc->collectTimeTo}}">
                </div>
<br>
                <div class="form-group row" style="padding-left: 15px">
                    <label for="payAcc">Paylah/Paynow Account No. : </label>
                    <input class="form-control" type="text" name="payAcc" id="payAcc" value="{{$desc->payAcc}}">
                </div>

                <input type="hidden" name="id" value="{{$desc->id}}">

                <div class="form-group row float-right" style="padding-left: 15px">
                    <button type="submit" class="btn btn-lg btn-secondary viewbutt">Update!</button>
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>
<div class="col-1"></div>
@endsection