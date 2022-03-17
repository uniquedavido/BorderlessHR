<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployerRegisterController extends Controller
{
    /**
     * Create a new user instance after a valid employer registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function employerRegister()
    {
        $user =  User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
        ]);

        Company::create([
            'user_id' => $user->id,
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
        ]);

        return redirect()->to('login');
    }
}
