@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $job->title }}</div>

                <div class="card-body">
                    <p><h3>Description : </h3>{{$job->description}}</p>
                    <p><h3>Duties: </h3>{{$job->roles}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Short Info') }}</div>

                <div class="card-body">
                    <p>Company: <a href="{{route('company.index', [$job->company->id, $job->company->slug])}}"> {{$job->company->name}}</a></p>
                    <p>Job Address: {{$job->address}}</p>
                    <p>Employement Type: {{$job->type}}</p>
                    <p>Position: {{$job->position}}</p>
                    <p>Date: {{$job->created_at->diffForHumans()}}</p>
                </div>
            </div>
            <br>
            @if(Auth::check() && Auth::user()->user_type = 'seeker')
            <button class="btn btn-success" style="width:100%;">Apply</button>
            @endif
        </div>
    </div>
</div>
@endsection
