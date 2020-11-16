@extends('layouts.app')

@section('content')
<?php include("header.php"); ?>
<div class="contcaption">
    <img src="res/leafy.jpg" class="mx-auto d-block topzero banner" style="width:100%;">
    <div class="centre-banner">
        <p>
            AUTHENTIC HOME CUISINE <br> 
            <span style="font-style: italic;">from home-based sellers around you</span>
        </p>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-6">
            <img class="img-responsive homecollage " src="res/makcik.png" alt="Nakcik" width="100%" >
            
            <p class="bigHeader"><br>Local Healthy Cuisine For Everyone</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-6">
            <br>
            <p class="bigHeader">Prepared from Home, <br> Sold from Home</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <br>
            <img class="img-responsive homecollage" src="res/asian.jpeg" alt="asian" width="100%" > 
        </div>
    </div>
</div>





@endsection