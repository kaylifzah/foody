@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">

                    <p class="cardheader" style="text-align: center">{{ $user->name }}
                        <br>
                        {{ $user->email }}</p>


                    <form action="{{ route('updateprofile') }}" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="form-group col-md-6" style="padding-left: 0px">
                            <label>Upload your profile picture: &nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-secondary btn-file"><input type="file" name="profilepic" id="imgInp">
                                    </span>
                                </span>
                            </div>
                            <br>
                            <img id='img-upload' style="width: 100%" src="/images/profile/{{$profile->profilepic}}"/>
                        </div><br>

                        <p class="allzero">Location: </p>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="location" value="sembawang"
                                    {{ ($profile->location=="sembawang")? "checked" : "" }}>Sembawang
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="location" value="woodlands"
                                    {{ ($profile->location=="woodlands")? "checked" : "" }}>Woodlands
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="location" value="yishun"
                                    {{ ($profile->location=="yishun")? "checked" : "" }}>Yishun
                            </label>
                        </div><br>

                        <div class="form-group row" style="padding-left: 15px; padding-right: 15px;">
                            <label for="about">About Me: </label>
                            <input class="form-control" type="text" name="about" id="about"
                                value="{{ $profile->about }}">
                        </div>



                        <div class="form-group row float-right" style="padding-right: 15px">
                            <button type="submit" class="btn btn-secondary viewbutt ">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection