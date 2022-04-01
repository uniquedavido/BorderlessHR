@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(!isset(Auth::user()->company->name))
            @foreach($jobs as $job)
                <div class="card">
                    <div class="card-header">{{ $job->title }}<span class="float-right badge badge-primary">{{$job->position}}</span></div>

                    <div class="card-body">
                        {{$job->description}}
                    </div>
                    
                    <div class="card-footer">
                        <span><a href="{{route('jobs.show',[$job->id, $job->slug])}}">View saved job</a></span>
                        <span class="float-right">
                            Deadline : {{$job->last_date}}
                        </span>
                    </div>
                </div>
                <br>
            @endforeach
        @else
                    <div class="card">
                        <div class="card-header">{{ __('Recent Jobs') }}</div>

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
                                            <img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" width="40px" height="40px" alt="">
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
        @endif
        </div>
    </div>
</div>
@endsection
