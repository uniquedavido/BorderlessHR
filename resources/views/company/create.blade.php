@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->company->logo))
                <img src="{{asset('avatar/male_avatar.png')}}" width="100" style="width:100%" alt="">
            @else
                <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100" style="width:100%" alt="">
            @endif
            <br><br/>
            <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">
                    Update logo
                </div>
                <div class="card-body">
                    <input type="file" id="logo" name="logo" class="form-control">
                    @if($errors->has('logo'))
                        <div class="errors" style="color:red">
                            {{$errors->first('logo')}}
                        </div>
                    @endif
                    <br>
                    <button class="btn btn-dark" type="submit">Update</button>
                </div>
            </div>
            </form>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Update Your Company Information</div>

                <form action="{{route('company.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" value="@if(isset(Auth::user()->company->address)){{Auth::user()->company->address}}@endif">
                            @if($errors->has('address'))
                                <div class="errors" style="color:red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone number">Phone number</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="@if(isset(Auth::user()->company->phone)){{Auth::user()->company->phone}}@endif">
                            @if($errors->has('phone'))
                                <div class="errors" style="color:red">
                                    {{$errors->first('phone')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" id="website" name="website" class="form-control" value="@if(isset(Auth::user()->company->website)){{Auth::user()->company->website}}@endif">
                            @if($errors->has('website'))
                                <div class="errors" style="color:red">
                                    {{$errors->first('website')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="slogan">Slogan</label>
                            <input type="text" id="slogan" name="slogan" class="form-control" value="@if(isset(Auth::user()->company->slogan)){{Auth::user()->company->slogan}}@endif">
                            @if($errors->has('slogan'))
                                <div class="errors" style="color:red">
                                    {{$errors->first('slogan')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="8" rows="8" class="form-control">@if(isset(Auth::user()->company->description)){{Auth::user()->company->description}}@endif</textarea>
                            @if($errors->has('description'))
                                <div class="errors" style="color:red">
                                    {{$errors->first('description')}}
                                </div>
                            @endif
                        </div>

                        <form-group>
                            <button class="btn btn-dark" type="submit">Update</button>
                        </form-group>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Company Information
                </div>
                <div class="card-body">
                    <p>Name : {{Auth::user()->company->name}}</p>
                    <p>Phone : {{Auth::user()->company->phone}}</p>
                    <p>Email : {{Auth::user()->email}}</p>
                    <p>Website : <a href="{{Auth::user()->company->website}}">{{Auth::user()->company->website}}</a></p>
                    <p>Company Page : <a href="company/{{Auth::user()->company->slug}}">View</a></p>
                </div>
            </div>
            <br>
            <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">
                    Update cover photo
                </div>
                <div class="card-body">
                    <input type="file" id="cover_photo" name="cover_photo" class="form-control">
                    @if($errors->has('cover_photo'))
                        <div class="errors" style="color:red">
                            {{$errors->first('cover_photo')}}
                        </div>
                    @endif
                    <br>
                    <button class="btn btn-dark" type="submit">Update</button>
                </div>
                    
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
