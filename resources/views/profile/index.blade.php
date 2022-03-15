@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->profile->avatar))
                <img src="{{asset('avatar/male_avatar.png')}}" width="100" style="width:100%" alt="">
            @else
                <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" width="100" style="width:100%" alt="">
            @endif
            <br><br/>
            <form action="{{route('profile.avatar')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">
                    Update avatar
                </div>
                <div class="card-body">
                    <input type="file" id="avatar" name="avatar" class="form-control">
                    @if($errors->has('avatar'))
                        <div class="errors" style="color:red">
                            {{$errors->first('avatar')}}
                        </div>
                    @endif
                    <br>
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
            </form>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Update Your Profile</div>

                <form action="{{route('profile.create')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" value="@if(isset(Auth::user()->profile->address)){{Auth::user()->profile->address}}@endif">
                            @if($errors->has('address'))
                                <div class="errors" style="color:red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address">Phone number</label>
                            <input type="text" id="phone_number" name="phone_number" class="form-control" value="@if(isset(Auth::user()->profile->phone_number)){{Auth::user()->profile->phone_number}}@endif">
                            @if($errors->has('phone_number'))
                                <div class="errors" style="color:red">
                                    {{$errors->first('phone_number')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <textarea name="experience" id="experience" cols="8" rows="8" class="form-control">@if(isset(Auth::user()->profile->experience)){{Auth::user()->profile->experience}}@endif</textarea>
                            @if($errors->has('experience'))
                                <div class="errors" style="color:red">
                                    {{$errors->first('experience')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="biography">Biography</label>
                            <textarea name="biography" id="biography" cols="8" rows="8" class="form-control">@if(isset(Auth::user()->profile->biography)){{Auth::user()->profile->biography}}@endif</textarea>
                            @if($errors->has('biography'))
                                <div class="errors" style="color:red">
                                    {{$errors->first('biography')}}
                                </div>
                            @endif
                        </div>

                        <form-group>
                            <button class="btn btn-success" type="submit">Update</button>
                        </form-group>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Personal Information
                </div>
                <div class="card-body">
                    <p>Name : {{Auth::user()->name}}</p>
                    <p>Email : {{Auth::user()->email}}</p>
                    <p>Gender : {{Auth::user()->profile->gender}}</p>
                    @if(isset(Auth::user()->profile->cover_letter))
                        <p>
                          <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Download Cover letter</a>
                        </p>
                    @else
                        <p>
                            Please upload cover letter
                        </p>
                    @endif
                    @if(isset(Auth::user()->profile->resume))
                        <p>
                          <a href="{{Storage::url(Auth::user()->profile->resume)}}">Download Resume</a>
                        </p>
                    @else
                        <p>
                            Please upload resume
                        </p>
                    @endif
                </div>
            </div>
            <br>
            <form action="{{route('profile.coverletter')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">
                    Update coverletter
                </div>
                <div class="card-body">
                    <input type="file" id="cover_letter" name="cover_letter" class="form-control">
                    @if($errors->has('cover_letter'))
                        <div class="errors" style="color:red">
                            {{$errors->first('cover_letter')}}
                        </div>
                    @endif
                    <br>
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
                    
            </div>
            </form>
            <br>
            <form action="{{route('profile.resume')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">
                    Update resume
                </div>
                <div class="card-body">
                    <input type="file" id="resume" name="resume" class="form-control">
                    @if($errors->has('resume'))
                        <div class="errors" style="color:red">
                            {{$errors->first('resume')}}
                        </div>
                    @endif
                    <br>
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
