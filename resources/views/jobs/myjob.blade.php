@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Jobs') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Logo</th>
                            <th>Position</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($jobs as $job)
                            <tr>
                                <td>
                                    @if(empty(Auth::user()->company->logo))
                                        <img src="{{asset('avatar/female_avatar.png')}}" width="40px" height="40px" alt="">
                                    @else
                                        <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="50px" height="50px" alt="">
                                    @endif
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
                                    <a href="{{route('job.edit', [$job->id])}}">
                                        <button class="btn btn-dark btn-sm mt-1"><i class="fa fa-edit" aria-hidden="true"></i> Edit </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
