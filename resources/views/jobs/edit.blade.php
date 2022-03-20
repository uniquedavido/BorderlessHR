@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit job post') }}</div>

                <form action="{{route('jobs.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $job->title }}">
                            @if($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('title')}}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" cols="4" rows="3" class="form-control @error('description') is-invalid @enderror">{{ $job->description }}</textarea>
                            @if($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                            <label for="roles">Roles / Expectation:</label>
                            <textarea name="roles" id="roles" cols="4" rows="3" class="form-control @error('roles') is-invalid @enderror">{{ $job->roles }}</textarea>
                            @if($errors->has('roles'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('roles')}}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == $job->category_id?'selected':''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('category')}}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" id="position" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ $job->position }}">
                            @if($errors->has('position'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('position')}}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea name="address" id="address" cols="4" rows="3" class="form-control @error('address') is-invalid @enderror">{{ $job->address }}</textarea>
                            @if($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('address')}}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                            <label for="employment type">Employment type:</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}">
                                <option value="fulltime" {{$job->type=='fulltime'?'selected':''}}>Fulltime</option>
                                <option value="parttime" {{$job->type=='parttime'?'selected':''}}>PartTime</option>
                                <option value="internship" {{$job->type=='internship'?'selected':''}}>Internship</option>
                                <option value="contract" {{$job->type=='contract'?'selected':''}}>Contract</option>
                            </select>
                            @if($errors->has('type'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('type')}}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}">
                                <option value="0" {{$job->status=='0'?'selected':''}}>Draft</option>
                                <option value="1" {{$job->status=='1'?'selected':''}}>Published</option>
                            </select>
                            @if($errors->has('status'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('status')}}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                            <label for="Last Date">Deadline:</label>
                            <input type="text" id="datepicker" name="last_date" class="form-control @error('last_date') is-invalid @enderror" value="{{ old('last_date') }}">
                            @if($errors->has('last_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('last_date')}}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                            <button class="btn btn-dark" type="submit">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
