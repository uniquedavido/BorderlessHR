@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Jobs') }}</div>
                
                <form action="{{route('jobs.alljobs')}}" method="GET">
                <div class="form-inline pt-3">
                    <div class="form-group">
                        <label for="keyword" class="ml-4">Keyword : &nbsp;</label>
                        <input type="text" name="title" class="form-control" style="width:180px;" value="{{ old('keyword') }}">&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <label for="employment type">Employment type : &nbsp;</label>
                        <select name="type" id="type" class="form-control" value="{{ old('type') }}">
                            <option value="">-Select-</option>
                            <option value="fulltime">Fulltime</option>
                            <option value="parttime">PartTime</option>
                            <option value="internship">Internship</option>
                            <option value="contract">Contract</option>
                        </select>&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <label for="category">Category : &nbsp;</label>
                        <select name="category" id="category" class="form-control" value="{{ old('category') }}">
                            <option value="">-Select-</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <label for="address">Address : &nbsp;</label>
                        <input type="text" name="address" class="form-control" style="width:180px;">&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                    </div>
                </div>
                </form>

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
                    {!! $jobs->appends(['sort' => 'keyword'])->links() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
