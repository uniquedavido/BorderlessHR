@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
    
        <div class="company-profile">
            <img src="{{asset('cover_photo/cover.jpg')}}" style="width: 100%" alt="">
            <div class="company-desc">
                <img src="{{asset('avatar/female_avatar.png')}}" width="100" alt="">
                <h1>{{$company->name}} </h1>
                <p><strong>Slogan</strong> - {{$company->slogan}} | <strong>Address</strong> - {{$company->address}} | <strong>Phone number</strong> - {{$company->phone}} | <strong>Website</strong> - {{$company->website}}</p>
                <p><strong>Company description</strong> - {{$company->description}}</p>
            </div>
        </div>
    
                    <table class="table">
                        <thead>
                            <th>Logo</th>
                            <th>Position</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($company->jobs as $job)
                            <tr>
                                <td>
                                    <img src="{{asset('avatar/female_avatar.png')}}" width="40px" height="40px" alt="">
                                </td>
                                <td>
                                    Position : {{$job->position}}
                                    <br/> <i class="fa fa-clock-o" aria-hidden="true">&nbsp; {{$job->type}}</i>
                                </td>
                                <td>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> Address : {{$job->address}}
                                </td>
                                <td>
                                    <i class="fa fa-calendar" aria-hidden="true"></i> Date : {{$job->created_at->diffForHumans()}}
                                </td>
                                <td>
                                    <a href="{{route('jobs.show', [$job->id, $job->slug])}}">
                                        <button class="btn btn-success btn-sm">Apply</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    </div>
</div>
@endsection
