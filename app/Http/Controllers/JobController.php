<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::all()->take(10);
        return view('welcome')->with('jobs', $jobs);
    }
    public function show($id, Job $job){
        return view('jobs.show')->with('job', $job);
    }
}
