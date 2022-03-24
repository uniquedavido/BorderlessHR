@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                    <a href="{{route('jobs.alljobs')}}"><button class="btn btn-success btn-lg" style="width:100%;">Browse all jobs</button></a>
                    <br><br><hr>
                    <h3>Featured Companies</h3>
                    <div class="container">
                        <div class="row">
                            @foreach($companies as $company)
                            <div class="col-md-3 mt-4 pl-2">
                                <div class="card" style="width: 16rem;">
                                    <img class="card-img-top" alt="Card image cap" src="{{asset('uploads/logo')}}/{{$company->logo}}" style="width:100%" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$company->name}}</h5>
                                        <p class="card-text">{{Str::limit($company->description, 40)}}</p>
                                        <a href="{{route('company.index', [$company->id, $company->slug])}}" class="btn btn-success">view company</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .fa{
        color:#4183D7;
    }
</style>
