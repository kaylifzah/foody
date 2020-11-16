@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    <p class="medcardheader" style="text-align: center">Hello {{ $user->name }}!
                    <br>
                    {{ $user->email }}</p>


                    <form action="{{ route('storeprofile') }}" enctype="multipart/form-data" method="post">
                        @csrf

                        {{-- <div class="form-group row" style="padding-left: 15px">
                            <label for="profilepic">Upload your profile picture: &nbsp;</label>
                            <input type="file" name="profilepic" id="profilepic">
                        </div><br> --}}

                        <div class="form-group col-md-6" style="padding-left: 0px">
                            <label>Upload your profile picture: &nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-secondary btn-file"><input type="file" name="profilepic" id="imgInp">
                                    </span>
                                </span>
                            </div>
                            <br>
                            <img id='img-upload' style="width: 100%"/>
                        </div><br>
                        
                        <p class="allzero">Location: </p>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="location" value="sembawang">Sembawang
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="location" value="woodlands">Woodlands
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="location" value="yishun">Yishun
                            </label>
                        </div> <br>

                        <div class="form-group row" style="padding-left: 15px; padding-right: 15px;">
                            <label for="about">About Me: </label>
                            <input class="form-control" type="text" name="about" id="about">
                        </div>

                        <div class="form-group row float-right" style="padding-right: 15px;">
                            <button type="submit" class="btn btn-secondary viewbutt ">Create Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection