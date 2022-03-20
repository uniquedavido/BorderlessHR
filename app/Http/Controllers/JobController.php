<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\JobPostRequest;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::all()->take(10);
        return view('welcome')->with('jobs', $jobs);
    }

    public function show($id, Job $job){
        return view('jobs.show')->with('job', $job);
    }

    public function myjob(){
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjob')->with('jobs', $jobs);
    }

    public function edit($id){
        $job = Job::findOrFail($id);
        $categories = Category::all();
        return view('jobs.edit')->with('categories', $categories)->with('job', $job);
    }

    public function create(){
        $categories = Category::all();
        return view('jobs.create')->with('categories', $categories);
    }

    public function store(JobPostRequest $request){
        /**$this->validate($request, [
            'title' => 'required|min:20',
            'description' => 'required|min:50',
            'roles' => 'required|min:50',
            'category' => 'required|numeric',
            'position' => 'required|min:3',
            'address' => 'required|min:20',
            'type' => 'required|min:3',
            'status' => 'required',
            'last_date' => 'required',
        ]);**/
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'roles' => $request->roles,
            'category_id' => $request->category,
            'position' => $request->position,
            'address' => $request->address,
            'type' => $request->type,
            'status' => $request->status,
            'last_date' => $request->last_date,
        ]);
        return redirect()->back()->with('message', 'Job created successfully');
    }
}
