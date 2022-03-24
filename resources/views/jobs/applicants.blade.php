@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @foreach($applicants as $applicant)
                <div class="card-header"><h4><a href="{{route('jobs.show', [$applicant->id, $applicant->slug])}}">{{ $applicant->title }}</a> </h4></div>

                <div class="card-body">
                    
                    <table class="table">
                            <thead>
                                <th>Picture</th>
                                <th>Username</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Resume</th>
                                <th>Cover letter</th>
                                <th>Date</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($applicant->users as $user)
                                <tr>
                                    <td>
                                        
                                        @if(empty($user->profile->avatar))
                                            <img src="{{asset('avatar/female_avatar.png')}}" width="40px" height="40px" alt="">
                                        @else
                                            <img src="{{asset('uploads/avatar')}}/{{$user->profile->avatar}}" width="50px" height="50px" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <span class="small"> Username : {{$user->name}}</span>
                                         <i class="fa fa-envelope small" aria-hidden="true"></i>{{$user->email}}
                                    </td>
                                    <td>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> <span class="small"> Address: {{$user->profile->address}} </span>
                                          <br/><i class="fa fa-briefcase" aria-hidden="true"></i><b>Bio: {{$user->profile->experience}}</b>
                                    </td>
                                    <td>
                                        <i class="fa fa-user" aria-hidden="true"></i> {{$user->profile->gender}}
                                    </td>
                                    <td>
                                        <a href="{{Storage::url($user->profile->resume)}}">Download Resume</a>
                                    </td>
                                    <td>
                                        <a href="{{Storage::url($user->profile->cover_letter)}}">Download Coverletter</a>
                                    </td>
                                    <td>
                                        <i class="fa fa-calendar" aria-hidden="true"></i> Date : {{$user->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        <a href="{{}}">
                                            <button class="btn btn-success btn-sm">Apply</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
