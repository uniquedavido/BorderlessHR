<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index($id, Company $company){
        return view('company.index')->with('company', $company);
    }

    public function create(){
        return view('company.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'address' => 'required|max:100',
            'phone' => 'required|min:10|numeric',
            'website' => 'required|max:100',
            'slogan' => 'required|max:200',
            'description' => 'required|max:200',
        ]);
        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'website' => $request->website,
            'slogan' => $request->slogan,
            'description' => $request->description,
        ]);
        return redirect()->back()->with('message', 'Company information updated successfully');
    }

    public function coverPhoto(Request $request){
        $this->validate($request, [
            'cover_photo' => 'required|mimes:jpeg,jpg,png|max:2000000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasfile('cover_photo')){
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/coverphoto/', $filename);
            Company::where('user_id', $user_id)->update([
                'cover_photo' => $filename
            ]);
            return redirect()->back()->with('message', 'Company cover photo updated successfully');
        }
    }

    public function companyLogo(Request $request){
        $this->validate($request, [
            'logo' => 'required|mimes:jpeg,jpg,png|max:2000000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasfile('logo')){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo/', $filename);
            Company::where('user_id', $user_id)->update([
                'logo' => $filename
            ]);
            return redirect()->back()->with('message', 'Company logo updated successfully');
        }
    }
}
